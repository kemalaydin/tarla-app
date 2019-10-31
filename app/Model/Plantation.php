<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plantation extends Model
{
    protected $fillable = ['garden_name','area'];
    public function products(){
        return $this->hasMany('App\Model\Product','plantation_id','id');
    }
}
