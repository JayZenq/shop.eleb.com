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
    return view('users/index');
});

Route::resource('/users','UsersController');
Route::resource('/menucategories','MenuCategoriesController');
Route::resource('/menus','MenusController');
//会话管理
Route::get('login', 'SessionController@login')->name('login');
Route::get('change/{user}', 'SessionController@change')->name('change');
Route::post('login', 'SessionController@store')->name('login');
Route::delete('logout/{user}', 'SessionController@destroy')->name('logout');
Route::patch('update/{user}', 'SessionController@updates')->name('updates');

//文件上传的路由
Route::post('upload',function (){
    $storage =  \Illuminate\Support\Facades\Storage::disk('oss');
    $fileName= $storage->putFile('upload',request()->file('file'));
    return [
        'fileName'=>$storage->url($fileName),
    ];
})->name('upload');

Route::resource('/activities','ActivitiesController');
//订单管理
Route::resource('/order','OrdersController');
//修改订单状态
Route::get('/order_status/{order}', 'OrdersController@status')->name('order.status');
//订单统计
Route::get('/order_count', 'OrdersController@count')->name('order.count');
Route::get('/order_year', 'OrdersController@year')->name('order.year');
Route::get('/order_month', 'OrdersController@month')->name('order.month');
Route::get('/order_day', 'OrdersController@day')->name('order.day');
Route::get('/order_menu', 'OrdersController@menu')->name('order.menu');
Route::get('/order_menum', 'OrdersController@menu_month')->name('order.menu_month');