<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use app\controller\vedio;
use think\facade\Route;

// Route::get('think', function () {
//     return 'hello,ThinkPHP6!';
// });

// Route::get('hello/:name', 'index/hello');
Route::resource('user','User');
Route::post('user','User/index');
Route::put('user','User/update');
Route::delete('user','User/delete');
Route::resource('login', 'Login');
Route::post('login/save','Login/save');
Route::resource('admin', 'Admin');
Route::put('admin','Admin/update');
Route::delete('admin','Admin/delete');
Route::post('infor','Infor/read');
Route::post('product/newproduct','Product/newproduct');
Route::resource('address','Address');
Route::put('address','Address/update');
Route::resource('robotadd','RobotAdd');
Route::resource('collect','collect');
Route::resource('order', 'order');
Route::put('order','Order/update');
Route::resource('fk','Fk');
Route::resource('tz','Tz');
Route::put('collect','Collect/update');
Route::put('dd','Dd/update');
Route::resource('vedio','vedio');
Route::delete('dd','Dd/delete');
Route::delete('collect','Collect/delete');
Route::post('app','app/save');
Route::get('app/seller','app/seller');
Route::get('tz/seller','Tz/seller');