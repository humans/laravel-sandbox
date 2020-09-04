<?php

namespace Humans\Sandbox\Controllers;

use Illuminate\Http\Request;
use Humans\Sandbox\Facade as Sandbox;

class RunSandboxController
{
    public function __invoke(Request $request)
    {
        return Sandbox::run($request->sandbox);
    }
}
