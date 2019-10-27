<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public function image(){
        return $this->morphOne('App\Model\Image', 'imageable');
    }
}