<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function businness()
    {
        return $this->belongsTo(Business::class);
    }
    public function adRequests()
    {
        return $this->hasMany(adRequest::class);
    }
    public function adImages()
    {
        return $this->hasMany(AdImage::class);
    }
    public function adForms()
    {
        return $this->hasMany(AdForm::class);
    }
    public function targets()
    {
        return $this->belongsToMany(Target::class,'ad_target_taggings','target_id','ad_id');
    }
}
