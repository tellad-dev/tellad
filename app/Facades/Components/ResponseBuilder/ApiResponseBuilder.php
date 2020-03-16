<?php namespace App\Facades\Components\ResponseBuilder;

use Illuminate\Support\Facades\Facade;

class ApiResponseBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'apiResponseBuilder';
    }
}
