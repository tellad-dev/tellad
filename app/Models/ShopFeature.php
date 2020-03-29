<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopFeature extends Model
{
    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
