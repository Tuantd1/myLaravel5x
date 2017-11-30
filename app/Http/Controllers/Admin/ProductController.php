<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Models\ProductModel;

class ProductController extends Controller
{
    public function index(Request $request){
        $data = [];
        $data['name']  = '';
        $data['email'] = '';
        if(Auth::check()){
            $user = Auth::user();
            $data['name'] = $user->name;
            $data['email'] = $user->email;
        }
        $request->session()->put('username', $data['name']);
        $request->session()->put('email', $data['email']);
        //Session::put('username', $data['name']);
        //Session::put('email', $data['email']);
        $data['messAction'] = $request->session()->get('delete_mess');

        $data['title']  = "This is list product";

        $data['product'] = DB::table('product')->paginate(4);

        return view('admin.product.index',$data);
    }

    public function add(Request $request){
        $dat = [];
        $data['cat']  = DB::table('category')->get()->toArray();
        $data['size'] = DB::table('size')->get()->toArray();
        $data['title'] = "this is add product";
        return view('admin.product.add',$data);
    }

    private function _myUploads($dataFile){
        // lay ra ten file
        $nameFile = $dataFile->getClientOriginalName();
        // loai fil
        $typeFile = $dataFile->getMimeType();
        // kich thuoc
        $sizeFile = $dataFile->getSize();
        // xem file co loi hay ko
        $errFile  = $dataFile->getError();

        if($dataFile->move('uploads/images/',$nameFile)){
            return $nameFile;
        }
        return;
    }

    public function handle(StoreProductsPost $request){

        // kim tra xem nguoi dung chon file hay chua
        $photo    = null;
        $fileName = null;
        $file     = null;

        if($request->hasFile('photo'))
        {
            $photo      = $request->file('photo');
            $dataUpload = $request->only('photo');
            $file       = $dataUpload['photo'];
        }
        $validator = Validator::make(
            ['photo' => $file],
            ['photo' => 'required|image|mimes:jepg,png,gif|max:10000'],
            [
                'photo.required' => 'Vui long chon anh',
                'photo.image' => 'file up load phai la anh',
                'photo.mimes' => 'chi chap nhap dinh dang : jpeg, png, gif',
                'photo.max' => 'dung luong file khong lon hon :max kb',
            ]
        );

        if ($validator->fails())
        {
            return redirect()->route('admin.addproduct')->withErrors($validator)->withInput();
        }
        else
        {
            // moi cho upload file anh
            $fileName = $this->_myUploads($photo);
        }

        //  thanh cong - chay qua lenh validate()
        //  loi thi no khong chay xuong dung ngay o ham validate
        //  tat ca cac buoc deu hop le ve du lieu - bat luu vao database
        $data = [];
        $data['name_pd'] = $request->input('nameproduct');
        $data['des_pd']  = $request->input('desproduct');
        $data['id_cat']  = $request->input('chooseCat');
        $data['id_size']  = $request->input('chooseSize');
        $data['price_pd'] = $request->input('priceproduct');
        $data['status'] = 1;
        $data['img_pd'] = $fileName;
        $data['qty_pd'] = $request->input('qtyproduct');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = null;
        $add = ProductModel::insertDataProduct($data);
        if($add){
            return redirect()->route('admin.product');
        }else{
            return redirect()->route('admin.addproduct',['state'=>'fail']);
        }
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $id = is_numeric($id) ? $id : 0;
        $delete = DB::table('product')->where('id',$id)->delete();
        if($delete){
            $request->session()->flash('delete_mess', 'Delete Success');
            return redirect()->route('admin.product');
        }else{
            $request->session()->flash('delete_mess', 'Delete Fail');
            return redirect()->route('admin.product',['state'=>'fail']);
        }
    }

    public function edit($id = null, Request $request){
        $id = is_numeric($id) ? $id : 0;
        $data = [];
        $data['info']  = DB::table('product')->where('id',$id)->get()->first();
        $data['title'] = "This is edit product";

        if(empty($data['info'])){
            return 'Not found Data';
        }else{
            $data['cat']  = DB::table('category')->get();
            $data['size'] = DB::table('size')->get();
            return view('admin.product.edit',$data);
        }
    }

    public function hanldEdit(Request $request){
        // coi nhu du lieu hop le - bo qua validate data

        $photo    = null;
        $fileName = null;
        if($request->hasFile('photo')){
            $photo    = $request->file('photo');
            $fileName = $this->_myUploads($photo);
        }

        $avatar = ($fileName == null OR $fileName == '') ? ($request->input('hddImage')) : $fileName;
        $namePd = $request->input('nameproduct');
        $desPd  = $request->input('desproduct');
        $cat    = $request->input('chooseCat');
        $size   = $request->input('chooseSize');
        $price  = $request->input('priceproduct');
        $qty    = $request->input('qtyproduct');
        $status = $request->input('chooseStatus');

        $data = array(
            'name_pd' => $namePd,
            'des_pd' => $desPd,
            'id_cat' => $cat,
            'id_size' => $size,
            'price_pd' => $price,
            'status' => $status,
            'img_pd' => $avatar,
            'qty_pd' => $qty,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $id = $request->input('hddIdProduct');
        $id = is_numeric($id) ? $id : 0;

        $update = DB::table('product')->where('id',$id)->update($data);
        if($update){
            $request->session()->flash('delete_mess', 'Edit Success');
            return redirect()->route('admin.product');
        }else{
            $request->session()->flash('delete_mess', 'Edit Fail');
            return redirect('/admin/product/edit/'.$id);
        }
    }
}
