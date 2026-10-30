<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithStatamicEntryFaking;

    protected function tearDown(): void
    {
        parent::tearDown();

    }
}
