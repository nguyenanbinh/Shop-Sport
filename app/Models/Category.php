<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','parent_id'
    ];

    protected $dates =['deleted_at'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image','imageable');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category','parent_id');
    }

    public function orders()
    {
        return $this->hasManyThrough('App\Models\Order', 'App\Models\Product');
    }
}
