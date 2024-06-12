<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class QuestionCommand extends Command
{
    protected $signature = 'question';

    protected $description = 'Command description';

    public function handle(): void
    {
        if ($a = $this->shouldShowHighHeartRiskNotification()) {
            $this->info('Show notification');
        } else {
            $this->info('Do not show notification');
        }

        dump($a);
    }

    public function shouldShowHighHeartRiskNotification(): bool
    {
        try {
            $answer = $this->ask('Do you want to alert users of high heart risk? Only do this when the heart risk calculations have changed. (y/n)', null);
        } catch (\Exception $exception) {
            $this->fail('Run from the command line.');
        }
        
        if (in_array($answer, ['y', 'Y', '1', 'yes'])) {
            return true;
        } else {
            return false;
        }
    }
}
