<?php

namespace Humans\Sandbox\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Humans\Sandbox\Contracts\RefreshDatabase;
use Humans\Sandbox\Contracts\RetainCurrentSession;
use Humans\Sandbox\Facade as Sandbox;

class RunSandboxController
{
    public function __invoke(Request $request)
    {
        $sandbox = Sandbox::make($request->sandbox);

        if ($sandbox instanceof RetainCurrentSession) {
            $user = Auth::user()->replicate();
        }

        if ($sandbox instanceof RefreshDatabase) {
            Artisan::call('migrate:fresh');
        }

        if ($sandbox instanceof RetainCurrentSession) {
            Auth::login(
                tap($user)->push()
            );
        }

        if (method_exists($sandbox, 'setup')) {
            $sandbox->setup();
        }

        return $sandbox->run();
    }
}
