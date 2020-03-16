<?php

namespace App\Facades\Components;

use Illuminate\Support\Facades\Facade;

class ArrayUtil extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'arrayUtil';
  }
}