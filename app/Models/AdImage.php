<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdImage extends Model
{
    public function Ad()
    {
        return $this->belongsToMany(Ad::class);
    }
}
