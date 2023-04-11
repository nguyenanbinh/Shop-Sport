<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'quantity', 'sale_id', 'category_id', 'brand_id'
    ];


    protected $dates =['deleted_at'];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function sale()
    {
        return $this->belongsTo('App\Models\Sale');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot('quantity','price');
    }


}
