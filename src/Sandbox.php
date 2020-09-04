<?php

namespace Humans\Sandbox;

use Illuminate\Support\Str;

abstract class Sandbox
{
    protected $title;

    abstract public function run();

    public function title()
    {
        if ($this->title) {
            return $this->title;
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
