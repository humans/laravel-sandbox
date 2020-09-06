<?php

namespace Humans\Sandbox\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Humans\Sandbox\Contracts\RefreshDatabase;
use Humans\Sandbox\Contracts\RetainCurrentSession;
use Humans\Sandbox\Facade as Sandbox;

class RunSandboxController
{
    public function __invoke(Request $request)
    {
        $sandbox = Sandbox::make($request->sandbox);

        if ($sandbox instanceof RefreshDatabase) {
            Artisan::call('migrate:fresh');
        }

        if ($sandbox instanceof RetainCurrentSession) {
            Auth::login($this->replicateCurrentUser());
        }

        if (method_exists($sandbox, 'setup')) {
            App::call([$sandbox, 'setup']);
        }

        return App::call([$sandbox, 'run']);
    }

    private function replicateCurrentUser()
    {
        return tap(Auth::user()->replicate())->save();
    }
}
