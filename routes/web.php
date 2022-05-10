<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/',function(){
    return redirect()->route('login');
});

Route::get('login', 'UserController@getLogin')->name('login');
Route::post('login1','UserController@postLogin')->name('postLogin');
Route::get('logout','UserController@getLogout')->name('logout');
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('home','UserController@home')->name('home');
    Route::get('user-manage','UserController@getListUser')->name('getListUser');
    Route::get('ajaxLockUser','UserController@lockUser')->name('ajaxLockUser');
    Route::get('ajaxDeleteUser','UserController@deleteUser')->name('ajaxDeleteUser');
    Route::post('ajaxEditUser','UserController@editUser')->name('ajaxEditUser');
    Route::get('ajaxNewUser','UserController@newUser')->name('ajaxNewUser');
    Route::get('ajaxList','UserController@listUser')->name('ajaxListUser');



    Route::get('ajaxListCustomer','CustomerController@listCustomer')->name('ajaxListCustomer');
    Route::get('customer-manage','CustomerController@getListCustomer')->name('getListCustomer');
    Route::post('customer-action','CustomerController@action')->name('customer.action'); //edit inline
    Route::get('ajaxNewCustomer','CustomerController@newCustomer')->name('ajaxNewCustomer');
    Route::post('submit','ImportController@excel')->name('submit');

    Route::group(['prefix'=>'product'],function(){
        Route::get('product-manage','ProductController@getListProduct')->name('getListProduct');
        Route::get('ajaxListProduct','ProductController@listProduct')->name('ajaxListProduct');

        Route::get('ajaxDeleteProduct','ProductController@deleteProduct')->name('ajaxDeleteProduct');
        Route::get('product-edit/{id}','ProductController@editProduct')->name('editProduct');
        Route::post('product-edit/{id}','ProductController@postEditProduct')->name('postEditProduct');
        Route::get('product-new','ProductController@newProduct')->name('newProduct');
        Route::post('product-new','ProductController@postNewProduct')->name('postNewProduct');


    });

    Route::group(['prefix'=>'order'],function(){
        Route::get('/','OrderController@getListOrder')->name('getListOrder');
        Route::get('ajaxListOrder','OrderController@listOrder')->name('ajaxListOrder');
        Route::get('detailOrder/{id}','OrderController@getDetailOrder')->name('getDetailOrder');

        Route::get('ajaxListOrderDetail/{id}','OrderController@listOrderDetail')->name('ajaxListOderDetail');
    });

    Route::get('error',function(){
        return view('admin.error');
    })->name('error');




});




