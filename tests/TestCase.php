<?php

namespace Produpress\Actito\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Produpress\Actito\ActitoServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ActitoServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('actito.uri', 'https://test.example.net/');
        config()->set('actito.key', '123');
        config()->set('actito.entity', 'testing');
        config()->set('actito.table', '1');
    }
}
