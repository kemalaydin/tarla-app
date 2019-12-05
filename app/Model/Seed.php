<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seed extends Model
{
    use SoftDeletes;
    protected $fillable = ['product_type','supplier_id','supply_status','stock','seed_name'];

    public function supplier(){
        return $this->hasOne('App\Model\Supplier','id','supplier_id')->withTrashed();
    }
    public function productType(){
        return $this->hasOne('App\Model\ProductType','id','product_type')->withTrashed();
    }
}
