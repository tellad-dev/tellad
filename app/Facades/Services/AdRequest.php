<?php namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class AdRequest extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adRequestService';
    }
}
