<?php

namespace Humans\Sandbox;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Collection;

class SandboxManager
{
    use Concerns\RegistersRoutes;

    protected $sandboxes = [];

    public function register($sandboxes = [])
    {
        $this->sandboxes = $sandboxes;
    }

    public function sandboxes()
    {
        return $this->sandboxes;
    }

    public function make($sandbox)
    {
        if (! in_array($sandbox, $this->sandboxes)) {
            // Throw an exception here.
        }

        return App::make($this->sandboxes[$sandbox]);
    }
}


