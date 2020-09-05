<?php

namespace Humans\Sandbox\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Humans\Sandbox\Contracts\RefreshDatabase;
use Humans\Sandbox\Contracts\RetainCurrentUser;
use Humans\Sandbox\Facade as Sandbox;

class RunSandboxController
{
    public function __invoke(Request $request)
    {
        $sandbox = Sandbox::make($request->sandbox);

        if ($sandbox instanceof RetainCurrentUser) {
            $user = Auth::user();
        }

        if ($sandbox instanceof RefreshDatabase) {
            Artisan::call('migrate:fresh');
        }

        if ($sandbox instanceof RetainCurrentUser) {
            $user->save();
        }

        if (method_exists($sandbox, 'setup')) {
            $sandbox->setup();
        }

        return $sandbox->run();
    }
}
