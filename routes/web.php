<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/home', function () {
    return 'Hello word';
});

Route::match(['get', 'post'], '/api/test', function () {
    return 'Hello word';
});

Route::any('/products', function () {
    return 'this is product';
});
// \d ~ [0-9];
// \w ~ [A-Za-z];
// truyen tham so len route
Route::get('/test/{id?}/{name?}',function($id = null, $name = null){
    return "this is id : " . $id . ' --  This is name :' . $name;
})->where(['id'=>'\d+', 'name'=>'\w+'])->name('abc');

// gom nhom route va dat tien to cho route
Route::prefix('admin')->group(function(){
    Route::get('/',function(){
        return 'this is admin';
    });
    Route::get('/dashboard',function(){
        return 'this is admin - Dashborad';
    });

    Route::get('/author',function(){
        return 'this is admin - author';
    });
});

// route lam viec voi con troller
Route::get('/home/{age?}','HomeController@index')->middleware('age')->where('age','\d+');
Route::get('/abc','Test\TestController@test')->name('testabc');