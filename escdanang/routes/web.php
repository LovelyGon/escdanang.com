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
    return view('admin.services');
});

Route:: get('admin/services','ServiceController@index');
Route::post('addSV','ServiceController@store');
Route::post('admin/editSV','ServiceController@Edit');
Route::get('admin/editSV','ServiceController@getEdit');
Route::get('admin/deleteSV/{id}','ServiceController@Delete');