<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function spaceForms()
    {
        return $this->hasMany(SpaceForm::class);
    }

    public function spaceImages()
    {
        return $this->hasMany(SpaceImage::class);
    }
}
