<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    protected $fillable = ['fertilizer_name','supplier_id','supply_status'];
    public function supplier(){
        return $this->hasOne('App\Model\Supplier','id','supplier_id');

    }
}
