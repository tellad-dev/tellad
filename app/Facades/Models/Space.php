<?php namespace App\Facades\Models;

use Illuminate\Support\Facades\Facade;

class Space extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'spaceModel';
    }
}
