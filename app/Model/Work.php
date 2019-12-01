<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;
    protected $fillable = ["user_id","product_id","work_type","details","work_code"];
    public function user(){
        return $this->hasOne('App\Model\User','id','user_id');
    }

    public function product(){
        return $this->hasOne('App\Model\Product','id','product_id');
    }
}
