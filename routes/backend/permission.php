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


Route::group(['middleware'=>'adminAuth:backend','prefix'=>'permission'],function (){
    //
    Route::get('', 'PermissionController@index')->name('backend.permission');
    Route::get('/list', 'PermissionController@list')->name('backend.permission.list');
    Route::get('/children/permission', 'PermissionController@childrenPermission')->name('backend.permission.children');


    Route::get('/create','PermissionController@create')->name('backend.permission.create');
    Route::post('/store','PermissionController@store')->name('backend.permission.store');

    Route::get('/{id}/edit','PermissionController@edit')->name('backend.permission.edit');
    Route::post('/{id}/update','PermissionController@update')->name('backend.permission.update');

    Route::post('/destroy','PermissionController@destroy')->name('backend.permission.destroy');


});


