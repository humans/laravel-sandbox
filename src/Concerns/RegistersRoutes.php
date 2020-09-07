<?php

namespace Humans\Sandbox\Concerns;

use Illuminate\Support\Facades\Route;
use Humans\Sandbox\Controllers\RunSandboxController;

trait RegistersRoutes
{
    public function routes()
    {
        Route::post('sandboxes/run', [RunSandboxController::class, '__invoke'])->name('sandboxes.run');
    }
}
