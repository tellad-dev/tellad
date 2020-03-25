<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function spaces()
    {
        return $this->hasMany(Space::class);
    }
}
