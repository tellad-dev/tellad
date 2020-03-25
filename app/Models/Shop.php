<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function space()
    {
        return $this->hasMany(Space::class);
    }

    public function shopImage()
    {
        return $this->hasOne(shopImage::class);
    }
}
