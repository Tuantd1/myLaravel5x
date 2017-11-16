<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";

    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    public function category(){
        return $this->belongsTo('App\Category','id_cat','id');
    }

    public function size(){
        return $this->belongsTo('App\Size','id_size','id');
    }

    public function getDataById($id){
        $data = Product::find($id)->join(
            'size','size.id','=','product.id_size'
        )->join(
            'category','category.id','=','product.id_cat'
        )->get()->first()->toArray();
        return $data;
    }
}
