<?php

namespace Humans\Sandbox\Console;

use Illuminate\Console\GeneratorCommand;

class SandboxMakeCommand extends GeneratorCommand
{
    protected $name = 'make:sandbox';

    protected $description = 'Create a new sandbox';

    protected $type = 'Sandbox';

    public function getStub()
    {
        return __DIR__.'/stubs/sandbox.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Sandbox';
    }
}

