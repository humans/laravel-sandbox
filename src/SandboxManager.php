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
        $this->sandboxes = Collection::make($sandboxes)->mapWithKeys(function ($sandbox) {
            return [$sandbox => App::make($sandbox)];
        });
    }

    public function sandboxes()
    {
        return $this->sandboxes;
    }

    public function make($sandbox)
    {
        if (! array_key_exists($sandbox, $this->sandboxes)) {
            // Throw an exception here.
        }

        return $this->sandboxes[$sandbox];
    }
}


