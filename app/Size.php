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

    public static function getDataByName($name){
        $data = Size::where(['name_size'=>$name,'status' => 1])->get()->first()->toArray();
        // Select * from size where name_size = :name_size AND status = 1;
        return $data;
    }

    public function myInsertData(){
        $size = new Size;
        $size->name_size = 'My-Size';
        $size->des_size = 'test 123';
        $size->status = 0;
        $size->created_at = date('Y-m-d H:i:s');
        $size->save();
    }

    // c1 : save
    public function myEditData($id){
        $size = Size::find($id);
        $size->name_size = 'XL-100';
        $size->save();
    }
    // c2 : update
    public function myUpdateData($id){
        if(Size::where('id',$id)->update(['name_size' => 'XL-200']))
        {
            return TRUE;
        }
        return FALSE;
    }

    public function myDeleteData($id){
        $size = Size::find($id);
        if($size->delete())
        {
            return TRUE;
        }
        return FALSE;
    }
}
