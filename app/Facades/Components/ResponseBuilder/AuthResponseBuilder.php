<?php namespace App\Facades\Components\ResponseBuilder;

use Illuminate\Support\Facades\Facade;

class AuthResponseBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'authResponseBuilder';
    }
}
