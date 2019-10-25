<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function user(){
        return $this->belongsTo('App\Model\User','id');
    }

    public function product(){
        return $this->belongsTo('App\Model\Product','id');
    }
}
