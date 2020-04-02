<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class Business extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'businessModel';
    }
}
