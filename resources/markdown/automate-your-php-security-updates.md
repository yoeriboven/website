It's been raining security advisories in the PHP world lately. That's a good thing, it means maintainers are finding and patching issues in their packages.

It's also a bit annoying. When you're at your computer, a quick `composer update` is all it takes. But when you're not:

1. your app is vulnerable, and
2. (the real reason I built this) my security monitoring won't stop pinging me.

Wouldn't it be nice if a PR showed up on GitHub the moment a new advisory drops?

Let's build exactly that.

![A screenshot of the pull request on GitHub](/img/articles/security-patch-pr.png)

## Detecting the vulnerability
First we need to know when one of our installed packages has a vulnerability. For that I use [Laravel Health](https://spatie.be/docs/laravel-health/v1/introduction) and [Oh Dear](https://ohdear.app/).

Laravel Health is a package that checks the status of your app every minute and notifies you when something is off. It ships with checks for disk space, CPU usage, database connectivity, and many more. One of those checks looks for security advisories against the packages in your `composer.lock`.

Hooked up to Oh Dear, I get pinged whenever a check fails.

![A Telegram screenshot with notifications from Oh Dear](/img/articles/oh-dear-telegram.png)

That's the trigger we'll use to open the PR.

### Not using Laravel?
Take a look at the [security advisories health check](https://github.com/spatie/security-advisories-health-check/) and port the idea to plain PHP. There are a bunch of ways to fetch the data, so let your AI agent of choice help you out.

## Triggering the workflow
In a service provider we listen for the `CheckEndedEvent`. We first make sure we're dealing with a failed security advisories check, then build a cache key from the affected packages.

The cache key is there to avoid hitting the GitHub API every single minute. If we've already opened a PR for this exact set of packages, we bail out.

Otherwise we ask GitHub to trigger the workflow. If that request fails we don't want to break the health check, so we just silently report the exception.

```php
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Spatie\Health\Enums\Status;
use Spatie\Health\Events\CheckEndedEvent;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;

Event::listen(CheckEndedEvent::class, function (CheckEndedEvent $event) {
    if (! $event->check instanceof SecurityAdvisoriesCheck) {
        return;
    }

    if ($event->result->status === Status::ok()) {
        return;
    }

    $cacheKey = collect($event->result->meta)
        ->flatten(1)
        ->pluck('advisoryId')
        ->prepend('composer-security-advisories-failed:')
        ->join('&');

    if (Cache::has($cacheKey)) {
        return;
    }

    $affectedPackages = array_keys($event->result->meta);

    $response = Http::createPendingRequest()
        ->withToken(config('services.github.workflow_trigger_token'))
        ->post('https://api.github.com/repos/[repo_owner]/[repo_name]/dispatches', [
            'event_type' => 'composer-security-advisories-failed',
            'client_payload' => [
    'packages' => $affectedPackages,
            ],
        ]);

    if ($response->successful()) {
        Cache::put($cacheKey, true, now()->addWeek());
    } else {
        report($response->toException());
    }
});
```

Don't forget to swap `repo_owner` and `repo_name` for your own.

### The trigger token
[Head over to GitHub](https://github.com/settings/personal-access-tokens) to create a personal access token. Give it a reasonable lifetime. With the permissions scoped down, I think 180 days is fine. Limit it to this app's repository and give it `Contents: read and write`.

## Opening the pull request
Create a new `.yml` file under `.github/workflows/` and paste the following:

```yml
name: Composer Security Patch

on:
  repository_dispatch:
    types: [composer-security-advisories-failed]

permissions:
  contents: write
  pull-requests: write

jobs:
  patch:
    runs-on: ubuntu-latest
    env:
      PACKAGES: ${{ join(github.event.client_payload.packages, ' ') }}
      PACKAGES_LIST: ${{ join(github.event.client_payload.packages, ', ') }}
      BRANCH: security/composer-patches-${{ github.run_id }}
    steps:
      - uses: actions/checkout@v6
        with:
          token: ${{ secrets.CREATE_PR_TOKEN }}

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: 8.4
          extensions: mbstring, zip
          coverage: none

      - name: Update packages
        run: |
          set -euo pipefail

          if [[ -z "$PACKAGES" ]]; then
            echo "No packages in payload — nothing to patch."
            exit 0
          fi

          declare -A OLD_VERSIONS
          for pkg in $PACKAGES; do
            OLD_VERSIONS[$pkg]=$(jq -r --arg p "$pkg" '(.packages + .["packages-dev"])[] | select(.name == $p) | .version' composer.lock)
          done

          composer update $PACKAGES --with-all-dependencies --no-interaction --prefer-dist --no-progress --no-scripts

          {
            echo "| Package | Old | New |"
            echo "| --- | --- | --- |"
            for pkg in $PACKAGES; do
              new=$(jq -r --arg p "$pkg" '(.packages + .["packages-dev"])[] | select(.name == $p) | .version' composer.lock)
              echo "| \`$pkg\` | \`${OLD_VERSIONS[$pkg]:-—}\` | \`${new:-—}\` |"
            done
          } > /tmp/version-table.md

      - name: Open pull request
        env:
          GH_TOKEN: ${{ secrets.CREATE_PR_TOKEN }}
        run: |
          set -euo pipefail

          if [[ -z "$(git status --porcelain)" ]]; then
            echo "No changes — packages already patched."
            exit 0
          fi

          git config user.name "github-actions[bot]"
          git config user.email "41898282+github-actions[bot]@users.noreply.github.com"
          git checkout -b "$BRANCH"
          git add composer.json composer.lock
          git commit -m "chore(security): patch $PACKAGES_LIST"
          git push -u origin "$BRANCH"

          TABLE=$(cat /tmp/version-table.md)
          BODY="This PR was opened automatically after a Composer security advisory was detected.

          Laravel Health periodically runs a composer audit. When it surfaces a vulnerability, the app dispatches a \`repository_dispatch\` event to GitHub, and this workflow updates the affected packages and opens this PR for review.

          $TABLE"

          gh pr create \
            --base main \
            --head "$BRANCH" \
            --title "Security: patch $PACKAGES_LIST" \
            --body "$BODY"

```
The action only updates the packages flagged as vulnerable, and it skips composer scripts. That keeps the PR small and focused on the actual fix.

Before and after the update it grabs each package's version from `composer.lock` and writes a little markdown table to `/tmp/version-table.md`. That ends up in the PR body so you can see at a glance what changed.

The next step commits the changes to a new branch and opens the PR. You can tack on `--assignee [username]` to the `gh pr create` call if you want the PR assigned to a specific person.

### The PR token
By default the action doesn't have permission to open pull requests, so you'll need [a second token](https://github.com/settings/personal-access-tokens). This one needs `Contents: read and write` and `Pull requests: read and write`.

In your repo, go to `Settings → Secrets and variables → Actions → Secrets → Repository secrets` and save it as `CREATE_PR_TOKEN`.

## Wrapping up
That's it. Drop the workflow trigger token into your production environment, and the next time a security advisory rolls in, all you have to do is open GitHub and merge the PR.

Any questions, or looking for a developer? [Let me know](https://www.yoeri.me/contact-me).
