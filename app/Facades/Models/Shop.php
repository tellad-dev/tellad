<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class Shop extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shopModel';
    }
}
