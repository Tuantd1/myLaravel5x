<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size As DB;
class HomeController extends Controller
{
    // su dung middleware trong controller
    function __construct(){
        // only - except : rang buoc su chi phoi cua middleware doi voi cac phuong thuc trong controller
        // :checkEdit - truyen tham so vao middleware (muon bat duoc tham so nay - mo middleware len them tham so thu 3 vao fuction handle)
        //$this->middleware('myage:checkEdit')->only(['index','middle']);
        //$this->middleware('myage:checkEdit')->except(['index', 'middle']);
    }
    public function index($age = null){
        return 'this is index of Home controller';
    }

    // controller nhan tham so tu route gui len
    public function middle($age = null){
        return 'this is middle';
    }

    public function view(){
        // nap - goi 1 file view su dung ham view()
        $data = [];
        $data['name'] = 'NTT';
        $data['age']  = 28;
        $name = "<h1>PHP1705E</h1>";
        // truyen bien ra ngoai view - cach 1 (truyen nhieu bien 1 luc)
        //return view('home',$data);

        // thong khi truyen 1 bien ra view
        return view('home.home')->with('myname', $name);
    }

    public function product(){
        return view('home.product');
    }

    public function login(Request $request){
        // Request : la doi tuong nhan cac du lieu tu phia client gui len
        $username = $request->input('txtUsername','ABC');
        // $username = $_POST['txtUsername'];
        $password = $request->input('txtPass','ESC');
        // $password = $_POST['txtPass'];
        //dd($username ."-". $password);
        $data = $request->all();
        // chuyen huong trang dua vao ten route
        //return redirect()->route('product');
        $age = $request->query(); // ~ $request->all();
        $name = $request->query('name','ABC');
        //$name = $_GET['name'];
        //var_dump() + die;
        dd($age);
    }

    public function ajax(Request $request){
        $user = $request->input('username');
        $pass = $request->input('password');
        // response : tra ket qua ve cho client.
        // joson ~ json_encode()
        return response()->json($user);
    }

    public function testdb(){
        $data = DB::find(1)->product()->get()->toArray();
        dd($data);
    }
}
