<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopFeature extends Model
{
    protected $guarded = ['id'];
    
    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
