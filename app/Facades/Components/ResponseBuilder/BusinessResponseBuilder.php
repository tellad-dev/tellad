<?php namespace App\Facades\Components\ResponseBuilder;

use Illuminate\Support\Facades\Facade;

class BusinessResponseBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'businessResponseBuilder';
    }
}
