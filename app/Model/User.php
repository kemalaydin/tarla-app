<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token','api_token',
    ];

    public function works(){
        return $this->hasMany('App\Model\Work','user_id','id');
    }

    public function image(){
        return $this->morphOne('App\Model\Image', 'imageable');
    }

}
