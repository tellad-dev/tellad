<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpaceImage extends Model
{
    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
