<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Business extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'businessService';
    }
}
