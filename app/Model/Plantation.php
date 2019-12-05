<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plantation extends Model
{
    use SoftDeletes;
    protected $fillable = ['garden_name','area'];
    public function products(){
        return $this->hasMany('App\Model\Product','plantation_id','id')->withTrashed();
    }
}
