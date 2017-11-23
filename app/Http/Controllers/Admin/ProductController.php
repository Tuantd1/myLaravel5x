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

        return view('admin.product.index',$data);
    }

    public function add(Request $request){
        //$mySession = $request->session()->get('username');
        $dat = [];
        $data['cat']  = DB::table('category')->get()->toArray();
        $data['size'] = DB::table('size')->get()->toArray();
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
        $photo = null;
        $fileName = null;

        if($request->hasFile('photo'))
        {
            $photo    = $request->file('photo');
            $fileName = $this->_myUploads($photo);
        }

        /*
        $validator = Validator::make($request->all(), [
            'photo' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/product/add')
                        ->withErrors($validator)
                        ->withInput();
        }
        */
        // thanh cong - chay qua lenh validate()
        //  loi thi no khong chay xuong dung ngay o ham validate
        //
        // tat ca cac buoc deu hop le ve du lieu - bat luu vao database
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
}
