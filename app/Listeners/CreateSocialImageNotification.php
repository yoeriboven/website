<?php

namespace App\Listeners;

use App\Actions\CreateSocialImageAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Statamic\Events\EntrySaved;

class CreateSocialImageNotification implements ShouldQueue
{
    public function handle(EntrySaved $event)
    {
        if (! app()->environment('production')) {
            return;
        }

        if ($event->entry->collection->handle !== 'articles') {
            return;
        }

        (new CreateSocialImageAction())($event->entry->slug);
    }
}
