<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fertilizer extends Model
{
    use SoftDeletes;
    protected $fillable = ['fertilizer_name','supplier_id','supply_status'];
    public function supplier(){
        return $this->hasOne('App\Model\Supplier','id','supplier_id')->withTrashed();

    }
}
