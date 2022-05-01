<?php

namespace Produpress\Actito\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Produpress\Actito\ActitoServiceProvider;

class TestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            ActitoServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
