<?php

use LaraDumps\LaraDumps\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

function getLaravelDir(): string
{
    return __DIR__ . '/../vendor/orchestra/testbench-core/laravel/';
}

function requiresLaravel8()
{
    if (version_compare(app()->version(), '8.83.18', '<')) {
        test()->markTestSkipped('This test requires Laravel 8.83.18');
    }

    return test();
}
