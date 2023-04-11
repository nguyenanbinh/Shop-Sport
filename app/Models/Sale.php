<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sale extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','title','content','discount','start_day','end_day'
    ];

    protected $dates =['deleted_at'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
