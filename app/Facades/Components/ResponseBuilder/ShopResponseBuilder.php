<?php namespace App\Facades\Components\ResponseBuilder;

use Illuminate\Support\Facades\Facade;

class ShopResponseBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shopResponseBuilder';
    }
}
