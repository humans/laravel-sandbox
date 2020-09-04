<?php

namespace Humans\Sandbox;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sandbox';
    }
}
