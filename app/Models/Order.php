<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name','address','phone','email','note','status','user_id','status_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity','price');
    }

    // public function products()
    // {
    //     return $this->hasManyThrough('App\Models\Category', 'App\Models\Order');
    // }


}
