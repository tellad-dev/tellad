<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class Ad extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adModel';
    }
}
