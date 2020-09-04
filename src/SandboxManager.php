<?php

namespace Humans\Sandbox;

use Illuminate\Support\Facades\App;

class SandboxManager
{
    use Concerns\RegistersRoutes;

    protected $sandboxes = [];

    public function register($sandboxes = [])
    {
        $this->sandboxes = $sandboxes;
    }

    public function run($sandbox)
    {
        return $this->get($sandbox)->run();
    }

    public function get($sandbox)
    {
        if (! in_array($sandbox, $this->sandboxes)) {
            // Throw an exception here.
        }

        return App::make($sandbox);
    }
}


