<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable,HasRoles,SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','address','phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates =['deleted_at'];

    //

    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function newss()
    {
        return $this->hasMany('App\Models\News');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image','imageable');
    }


}
