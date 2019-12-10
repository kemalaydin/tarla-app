<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function imageable(){
        return $this->morphTo();
    }
}
