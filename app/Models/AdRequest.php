<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdRequest extends Model
{
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
    public function space()
    {
        return $this->belongsTo(Space::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
