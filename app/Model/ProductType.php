<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['product_name','product_type','growth_time'];

    public function image(){
        return $this->morphOne('App\Model\Image', 'imageable');
    }
}
