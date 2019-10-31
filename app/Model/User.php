<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function works(){
        return $this->hasMany('App\Model\Work','user_id','id');
    }

    public function avatar(){
        return $this->morphOne('App\Model\Image', 'imageable')->withDefault([
            'path' => 'images/users/no-image.png',
        ]);
    }

}
