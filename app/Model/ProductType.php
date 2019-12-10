<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use SoftDeletes;
    protected $fillable = ['product_name','product_type','growth_time'];

    public function image(){
        return $this->morphOne('App\Model\Image', 'imageable');
    }
}
