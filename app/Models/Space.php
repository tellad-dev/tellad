<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function adForm()
    {
        return $this->hasOne(AdForm::class);
    }

    public function spaceImage()
    {
        return $this->hasOne(SpaceImage::class);
    }
}
