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
// Route::get('admin/home', function (){
//     return view('admin.users');
// });
Route::get('admin/home', function (){
    return view('admin.admin-home');
});

Route:: get('admin/services','PageController@index');
Route::post('admin/addSV','ServiceController@store');
Route::get('admin/editSV','ServiceController@getEdit');
Route::post('admin/editSV','ServiceController@Edit');
Route::get('admin/deleteSV','ServiceController@Delete');
 Route::get('admin/customers', 'AdminCustomerController@index');
 Route::post('admin/add', 'AdminCustomerController@store');
Route::get('admin/edit', 'AdminCustomerController@edit');
Route::post('admin/edit', 'AdminCustomerController@update');
 Route::get('admin/delete', 'AdminCustomerController@destroy');

Route::get('admin/news', 'AdminNewsController@index');
Route::post('admin/addNews','AdminNewsController@store');
Route::get('admin/editNews', 'AdminNewsController@edit');
Route::post('admin/editNews', 'AdminNewsController@update');
Route::get('admin/deleteNews', 'AdminNewsController@destroy');
 