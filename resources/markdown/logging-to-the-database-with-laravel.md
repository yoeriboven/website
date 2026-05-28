For a project I wanted to know when a specific action happened. Notifications to e-mail or Slack were overkill. I wanted to see it in the app's dashboard.

Laravel has a pretty nice logging solution, but it doesn't write to the database. Luckily for me, it's pretty easy to add a new driver so that's what I did.

I wrapped the code up and put it in a package.

## Building the driver
Laravel's logging is using Monolog under the hood.

To build a new driver you need to create a new instance of `Monolog\Logger` and pass a handler to it. 

```php
<?php

namespace Yoeriboven\LaravelLogDb;

use Monolog\Logger;

class DatabaseLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @return Logger
     */
    public function __invoke(array $config)
    {
        return new Logger('Database', [
            new DatabaseHandler(),
        ]);
    }
}
```


The handler then receives an array of the log message you sent. This includes the message, the level (e.g. info or error) and any context that's applicable. 

```php
<?php

namespace Yoeriboven\LaravelLogDb;

use Monolog\Handler\AbstractProcessingHandler;
use Yoeriboven\LaravelLogDb\Models\LogMessage;

class DatabaseHandler extends AbstractProcessingHandler
{
    /**
     * @inheritDoc
     */
    protected function write(array $record): void
    {
        LogMessage::create([
            'level' => $record['level'],
            'level_name' => $record['level_name'],
            'message' => $record['message'],
            'logged_at' => $record['datetime'],
            'context' => $record['context'],
            'extra' => $record['extra'],
        ]);
    }
}
```

In the handler I create a new `LogMessage` which is an Eloquent model.

## Using the driver
Using the driver is simple: create a new channel in your `config/logging.php` file and you're set!

```php
use Yoeriboven\LaravelLogDb\DatabaseLogger;

return [
    'channels' => [
        'db' => [
            'driver' => 'custom',
            'via'    => DatabaseLogger::class,
        ],
    ]   
]
```
  
Now you can add the channel to the `stack` driver or explicitly log to the database.

```php
Log::channel('db')->info('Your message');
```

I wrapped it all up in a package: [yoeriboven/laravel-log-db](https://github.com/yoeriboven/laravel-log-db)

## In closing
Liked this post or going to use the package? I'd appreciate a retweet on [this tweet](https://twitter.com/yoeriboven/status/1534067663336620033?s=21&t=JX87qMNbelgh5uQJvrZcJQ). Thanks!