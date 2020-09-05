<?php

namespace Humans\Sandbox\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Humans\Sandbox\Contracts\RefreshDatabase;
use Humans\Sandbox\SandboxManager;

class RunSandboxController
{
    protected SandboxManager $sandbox;

    public function __construct(SandboxManager $sandbox)
    {
        $this->sandbox = $sandbox;
    }

    public function __invoke(Request $request)
    {
        if ($this->sandbox instanceof RefreshDatabase) {
            Artisan::call('migrate:fresh');
        }

        return $this->sandbox->run();
    }
}
