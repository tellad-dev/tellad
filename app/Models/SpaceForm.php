<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpaceForm extends Model
{
    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
