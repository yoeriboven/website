<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class QuestionCommand extends Command
{
    protected $signature = 'question';

    protected $description = 'Command description';

    public function handle(): void
    {
        $answer = $this->ask('Do you want to alert users of high heart risk? Only do this when the heart risk calculations have changed. (y/n)', null);

        if ($answer === null) {
            $this->error('Run from the command line.');
        }


        if (in_array($answer, ['y', 'Y', '1', 'yes'])) {
            $this->info('Show notification');
        } else {
            $this->info('Do not show notification');
        }

        dump($answer);
    }
}
