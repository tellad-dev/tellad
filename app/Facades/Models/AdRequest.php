<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class AdRequest extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adRequestModel';
    }
}
