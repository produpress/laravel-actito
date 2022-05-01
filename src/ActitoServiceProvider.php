<?php

namespace Produpress\Actito;

use Illuminate\Support\ServiceProvider;

class ActitoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/actito.php', 'actito');

        $this->app->bind('actito', function ($app) {
            return new Actito(
                config('actito.uri'),
                config('actito.entity'),
                config('actito.table'),
                config('actito.key')
            );
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
              __DIR__.'/../config/actito.php' => config_path('actito.php'),
            ], 'config');
        }
    }
}