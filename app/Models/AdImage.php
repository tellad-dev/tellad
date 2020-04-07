<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdImage extends Model
{
    protected $guarded = ['id'];

    public function Ad()
    {
        return $this->belongsToMany(Ad::class);
    }
}
