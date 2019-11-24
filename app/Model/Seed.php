<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{

    protected $fillable = ['product_type','supplier_id','supply_status','stock'];

    public function supplier(){
        return $this->hasOne('App\Model\Supplier','id','supplier_id');
    }

    public function productType(){
        return $this->hasOne('App\Model\ProductType','id','product_type');
    }
}
