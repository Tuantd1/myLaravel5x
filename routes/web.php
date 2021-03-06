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

Route::resource('/service', 'Service\ServiceController', ['only' => [
    'index', 'show', 'store', 'destroy'
]]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// service API
Route::group([
    'namespace'=>'API'
], function(){
    // lam viec voi action index/show - method : GET
    Route::resource('/service','ServiceController', ['only' => [
        'index', 'show'
    ]]);
});
// end service API

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  /*
  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');
  */

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});


Route::group([
    'middleware' => ['web', 'admin', 'auth:admin'],
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function ($router) {
    //require base_path('routes/admin.php');

    Route::get('/dashboard',function(){
        return 'This admin dashboard';
    });

    Route::get('/product','ProductController@index')->name('product');
    Route::get('/product/add','ProductController@add')->name('addproduct');
    Route::post('/product/handle','ProductController@handle')->name('handle');
    Route::get('/product/delete','ProductController@delete')->name('deleteproduct');
    Route::get('/product/edit/{id?}','ProductController@edit')->name('editproduct');
    Route::post('/product/hanldEdit','ProductController@hanldEdit')->name('hanldEdit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
