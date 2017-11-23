<?php
namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class ProductModel
{
    public static function insertDataProduct($data){
        if(DB::table('product')->insert($data)){
            return TRUE;
        }
        return FALSE;
    }

    // public static function getAllDataCategory(){
    //     $data = DB::table('category')->get();
    //     return $data;
    // }

    // public function getdataByName($name){
    //     $data = DB::table('category')->select('name_cat')->where('name_cat',$name)->orwhere('status',1)->get()->toArray();
    //     // select name_cat from category where name_cat = :name_cat OR status = 1
    //     return $data;
    // }
}