<?php

namespace App\Console\Commands;

use App\Actions\CreateSocialImageAction;
use Illuminate\Console\Command;

class CreateSocialImageCommand extends Command
{
    protected $signature = 'yoerime:generate-social-image {slug}';

    public function handle()
    {
        (new CreateSocialImageAction)($this->argument('slug'));
    }
}
