<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpaceImage extends Model
{
    protected $guarded = ['id'];

    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
