<?php

namespace App\Jobs;

use App\Actions\CreateSocialImageAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateSocialImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private string $slug)
    {
    }

    public function handle()
    {
        (new CreateSocialImageAction)($this->slug);
    }
}
