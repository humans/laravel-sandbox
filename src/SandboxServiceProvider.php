<?php

namespace Humans\Sandbox;

use Illuminate\Support\ServiceProvider;

class SandboxServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('sandbox', function () {
            return new SandboxManager;
        });

        $this->commands([
            Console\SandboxMakeCommand::class,
        ]);
    }

    public function boot()
    {
    }
}
