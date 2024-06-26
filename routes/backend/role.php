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


Route::group(['middleware'=>'adminAuth:backend','prefix'=>'role'],function (){
    //
    Route::get('', 'RoleController@index')->name('backend.role');
    Route::get('/list', 'RoleController@list')->name('backend.role.list');

    Route::get('/create','RoleController@create')->name('backend.role.create');
    Route::post('/store','RoleController@store')->name('backend.role.store');

    Route::get('/{id}/edit','RoleController@edit')->name('backend.role.edit');
    Route::post('/{id}/update','RoleController@update')->name('backend.role.update');

    Route::post('/destroy','RoleController@destroy')->name('backend.role.destroy');

    // 分配权限
    Route::get('/{id}/permission','RoleController@permission')->name('backend.role.permission');
    Route::post('/{id}/assignPermission','RoleController@assignPermission')->name('backend.role.assignPermission');

});


