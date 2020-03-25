<?php namespace App\Facades\Components\ResponseBuilder;

use Illuminate\Support\Facades\Facade;

class ProfileResponseBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'profileResponseBuilder';
    }
}
