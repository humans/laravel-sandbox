<?php

namespace Humans\Sandbox;

class SandboxManager
{
    protected $sandboxes = [];

    public function register($sandboxes = [])
    {
        $this->sandboxes = $sandboxes;
    }

    public function routes()
    {
        dd('registering routes');
    }
}


