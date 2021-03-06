<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerFeature extends Model
{
    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
