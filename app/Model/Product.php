<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["product_type","product_code","plantation_id","planting_date","crop_collecting_date","seed_id","fertilizer_id"];

    public function plantation(){
        return $this->hasOne('App\Model\Plantation','id','plantation_id');
    }

    public function productType(){
        return $this->hasOne('App\Model\ProductType','id','product_type');
    }

    public function seed(){
        return $this->hasOne('App\Model\Seed','id','seed_id');
    }

    public function fertilizer(){
        return $this->hasOne('App\Model\Fertilizer','id','fertilizer_id');
    }

    public function work(){
        return $this->hasMany('App\Model\Work','product_id','id');
    }

}
