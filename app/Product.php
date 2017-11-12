<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public function category(){
        return $this->belongsTo('App\Category','id_cat','id');
    }

    public function size(){
        return $this->belongsTo('App\Size','id_size','id');
    }
}
