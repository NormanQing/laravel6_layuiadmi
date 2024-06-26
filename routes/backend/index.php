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


Route::group(['middleware'=>'adminAuth:backend'],function (){
    //后台布局
    Route::get('', 'IndexController@layout')->name('backend.layout');
    //后台首页
    Route::get('index', 'IndexController@index')->name('backend.index');
    Route::get('/index1','IndexController@index1')->name('backend.index1');
    Route::get('/index2','IndexController@index2')->name('backend.index2');

});


