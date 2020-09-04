<?php

namespace Humans\Sandbox;

class SandboxManager
{
    use Concerns\RegistersRoutes;

    protected $sandboxes = [];

    public function register($sandboxes = [])
    {
        $this->sandboxes = $sandboxes;
    }
}


