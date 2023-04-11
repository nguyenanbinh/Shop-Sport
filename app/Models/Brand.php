<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image','imageable');
    }
}
