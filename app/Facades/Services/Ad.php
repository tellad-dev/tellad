<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Ad extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adService';
    }
}
