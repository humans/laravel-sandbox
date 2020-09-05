<?php

namespace Humans\Sandbox\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Humans\Sandbox\Contracts\RefreshDatabase;
use Humans\Sandbox\Facade as Sandbox;

class RunSandboxController
{
    protected SandboxManager $sandbox;


    public function __invoke(Request $request)
    {
        $sandbox = Sandbox::make($request->sandbox);

        if ($sandbox instanceof RefreshDatabase) {
            Artisan::call('migrate:fresh');
        }

        $sandbox->setup();

        return $sandbox->run();
    }
}
