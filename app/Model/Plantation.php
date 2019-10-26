<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plantation extends Model
{
    public function products(){
        return $this->hasMany('App\Model\Product','plantation_id','id');
    }
}
