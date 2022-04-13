---
id: 395fb013-49d7-43a9-bdb5-532e23d94f77
blueprint: articles
title: 'My first blogpost'
updated_by: 34a70845-2be0-4df6-abb9-741edbd0930a
updated_at: 1649863632
---
Dit is een test post

> Een quote

```php
echo 'testcode';
```

```php
<?php

namespace App\Jobs;

class FirstJob
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle() 
    {
        $this->batch()->add(new SecondJob());
    }
{
```
```php
/** @test */
public function it_dispatches_second_job()
{
    Bus::fake(SecondJob::class);

    Bus::batch(new FirstJob())->dispatch();

    Bus::assertBatched(function (PendingBatch $batch) {
        dump($batch->jobs); // Collection only has the FirstJob
    });
}
```

Een [link](https://www.google.com)

<a href="http://example.com/" target="_blank">Hello, world!</a>


- Ee
- Twee
- Drie

**Een tekst** *Schuin*

![alt text](https://i.redd.it/4ais1mdt5pr81.jpg)