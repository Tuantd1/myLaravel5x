<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = "size";
    public function product()
    {
        return $this->hasMany('App\Product','id');
    }
}
