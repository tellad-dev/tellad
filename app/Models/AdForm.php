<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdForm extends Model
{
    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
