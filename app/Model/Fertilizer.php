<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    public function supplier(){
        return $this->hasOne('App\Model\Supplier','id','supplier_id');
    }
}
