<?php

namespace Humans\Sandbox\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Humans\Sandbox\Facade as Sandbox;
use Humans\Sandbox\Contracts\RefreshDatabase;

class RunSandboxController
{
    public function __invoke(Request $request)
    {
        $sandbox = Sandbox::get($request->sandbox);

        if ($sandbox instanceof RefreshDatabase) {
            Artisan::call('migrate:fresh');
        }

        return $sandbox->run();
    }
}
