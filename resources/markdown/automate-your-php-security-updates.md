As PHP developers it has been raining security [issues] lately. This is a good thing because it means package maintainers found and patched security issues in their packages.

However, it can be quite annoying having to constantly update your code to apply the patch. If you are at your computer it is usually just a simple `composer update` to fix the issue. But what if you are not at your computer?

1) your app is vulnerable
2) (my real reason for the solution in this post)  my security monitoring keeps sending me notifications.

Wouldn't it be nice if a PR was opened on GitHub right when a new issue appear?

Let's build exactly that.

## Monitoring 
We need to know when we have a package installed that has issues. For that I use Laravel Health and OhDear.

Laravel Health is a package that checks the status of your app. It runs every minute and notifies you when things go wrong.
It has checks for available disk space, cpu usage, checking if your database is online, etc. 
It also has a check that checks whether there are any security advisories for the current application.

Hooked up to OhDear I get pinged whenever a check fails.

[image]

Let's hook into Laravel Health to automatically create a PR.

### Not using Laravel?
Check out the [security advisories health check](https://github.com/spatie/security-advisories-health-check/) and translate that to a plain PHP version. 

There are a bunch of different ways to get the data, let your AI agents help you. 

## Noticing the issue
In a service provider we hook into the `CheckEndedEvent`. After making sure we are working with a failed security advisories check we create a cache key from the affected packages.

This is to ensure we don't call the github action every minute. We check whether we have already created a PR for these packages and stop if we have.

Then we tell GitHub to trigger an action. If it fails we don't want the request to fail but silently report.

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

    Http::createPendingRequest()
        ->withToken(config('services.github.workflow_trigger_token'))
        ->post('https://api.github.com/repos/yoeriboven/hosmic/dispatches', [
            'event_type' => 'composer-security-advisories-failed',
            'client_payload' => [
    'packages' => $affectedPackages,
            ],
        ])
        ->onError(function (Response $response) {
            report($response->toException());
        });

    Cache::put($cacheKey, true, now()->addWeek());
});
```

### Getting a token
[Visit GitHub](https://github.com/settings/personal-access-tokens) to create an authorization token. 
Give it a reasonable lifetime. 
If you scope down the permissions I think a 180 day lifetime is fine. 
Only allow it on the app's repository. The permissions are `Contents: read and write`.

## The Github Action
Create a new `.yml` file under `.github/workflows/`. Paste the following code.

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
The action updates only the packages that have a security vulnerability. It also doesn't run scripts. This is to ensure the PRs stay small and only fix the issues.

The update data then gets written to a temporary file so we can show that information on the pull request.

In the next step the changed files are committed to a new branch and the pr is created. You could also add an `--assigned [username]` to the `gh pr create` call so it assigns the pr to the right user.

### Another token
The action by default does not have permission to open pull requests. 
You'll need to generate another token and add it to the repository's secrets.
The token needs two permissions this time: `Contents: read and write` and `Pull requests: read and write`.

Then on you repo you go to `Settings -> Secrets and variables -> Actions -> Secrets -> Repository secrets`. 
Save the token as `CREATE_PR_TOKEN`.

### end
And that's it. Make sure you save your workflow trigger token on your production environment and the next time a security vulnerability is found simply open GitHub and merge the pull request.

Any questions or looking for a developer? [Let me know](https://www.yoeri.me/contact-me).
