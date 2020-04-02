<?php namespace App\Facades\Components\ResponseBuilder;

use Illuminate\Support\Facades\Facade;

class UserResponseBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'userResponseBuilder';
    }
}
