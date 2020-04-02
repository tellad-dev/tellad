<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
  public function ads()
  {
      return $this->belongsToMany(Ad::class);
  }
}
