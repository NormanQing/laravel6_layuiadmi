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


Route::group(['middleware'=>'adminAuth:backend','prefix'=>'admin'],function (){
    //
    Route::get('', 'AdminController@index')->name('backend.admin');
    Route::get('/list', 'AdminController@list')->name('backend.admin.list');

    Route::get('/create','AdminController@create')->name('backend.admin.create');
    Route::post('/store','AdminController@store')->name('backend.admin.store');

    Route::get('/{id}/edit','AdminController@edit')->name('backend.admin.edit');
    Route::post('/{id}/update','AdminController@profileUpdate')->name('backend.admin.update');

    Route::post('/destroy','AdminController@destroy')->name('backend.admin.destroy');

    // 分配角色
    Route::get('/{id}/role','AdminController@role')->name('backend.admin.role');
    Route::post('/{id}/assignRole','AdminController@assignRole')->name('backend.admin.assignRole');

    // 分配权限
    Route::get('/{id}/permission','AdminController@permission')->name('backend.admin.permission');
    Route::post('/{id}/assignPermission','AdminController@assignPermission')->name('backend.admin.assignPermission');

    Route::get('/profile','AdminController@profile')->name('backend.admin.profile');
//    Route::post('/{$id}/profileUpdate','AdminController@profileUpdate')->name('backend.admin.profileUpdate');

    Route::post('/{id}/ddd','AdminController@profileUpdate')->name('backend.admin.ddd');


});


