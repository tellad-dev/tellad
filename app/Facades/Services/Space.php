<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Space extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'spaceService';
    }
}
