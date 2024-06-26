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


Route::group(['middleware'=>'adminAuth:backend','prefix'=>'admin_operation_log'],function (){
    //
    Route::get('', 'AdminOperationLogController@index')->name('backend.admin.operation_log');
    Route::get('/list', 'AdminOperationLogController@list')->name('backend.admin.operation_log.list');

});


