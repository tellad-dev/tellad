<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function businnes()
    {
        return $this->belongsTo(Business::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public function adImages()
    {
        return $this->hasMany(AdImage::class);
    }
    public function adForms()
    {
        return $this->hasMany(AdForm::class);
    }
}
