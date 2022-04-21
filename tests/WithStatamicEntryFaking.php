<?php

namespace Tests;

use Exception;
use Statamic\Facades\User;
use Statamic\Stache\Stache;
use Statamic\Entries\Entry;

trait WithStatamicEntryFaking
{
    protected array $filesToRemove = [];

    protected function cleanupStatamicData(): void
    {
        foreach ($this->filesToRemove as $file) {
            unlink($file);
        }
    }

    protected function makeStatamicUser(): \Statamic\Auth\File\User
    {
        $user = User::make()
            ->id((new Stache())->generateId())
            ->email('random@email.com')
            ->save();

        $this->filesToRemove[] = $user->initialPath();

        return $user;
    }

    protected function makeEntry(callable $callback): Entry
    {
        $entry = $callback();

        if (is_null($entry)) {
            throw new Exception('Entry not found.');
        }

        $this->filesToRemove[] = $entry->initialPath();

        return $entry;
    }
}
