<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spaces()
    {
        return $this->hasMany(Space::class);
    }

    public function shopImages()
    {
        return $this->hasMany(shopImage::class);
    }
    public function shopFeatures()
    {
        return $this->belongsToMany(ShopFeature::class,'shop_shop_feature_taggings','shop_id','shop_feature_id')
                    ->withTimestamps();;
    }
    public function customerFeatures()
    {
        return $this->belongsToMany(CustomerFeature::class,'shop_customer_feature_taggings','shop_id','customer_feature_id')
                    ->withTimestamps();
    }
}
