<?php

namespace Humans\Sandbox;

use Illuminate\Support\Str;

abstract class Sandbox
{
    protected $name;

    abstract public function run();

    public function id()
    {
        return get_called_class();
    }

    public function name()
    {
        if ($this->name) {
            return $this->name;
        }

        return (string) Str::of($this->classname())
            ->snake()
            ->replace('_', ' ')
            ->title();
    }

    private function classname()
    {
        return class_basename(get_called_class());
    }
}
