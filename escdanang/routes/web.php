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
    return view('admin.Service.services');
});
// Route::get('admin/home', function (){
//     return view('admin.users');
// });


Route:: get('admin/services','PageController@indexSV');
Route::post('admin/addSV','ServiceController@store');
Route::get('editSV','ServiceController@getEdit');
Route::post('admin/editSV','ServiceController@Edit');
Route::get('admin/deleteSV','ServiceController@Delete');

Route::get('admin/customers', 'AdminCustomerController@index');
Route::post('admin/add', 'AdminCustomerController@store');
Route::get('admin/edit', 'AdminCustomerController@edit');
Route::post('admin/editCustomers', 'AdminCustomerController@update');
 Route::get('admin/delete', 'AdminCustomerController@destroy');

Route::get('admin/news', 'AdminNewsController@index');
Route::post('admin/addNews','AdminNewsController@store');
Route::get('admin/edit', 'AdminNewsController@edit');
Route::post('admin/editNews', 'AdminNewsController@update');
Route::get('admin/deleteNews', 'AdminNewsController@destroy');

Route::get('admin/contacts', 'AdminContactController@index');
Route::get('admin/deleteContacts', 'AdminContactController@destroy'); 
//------- Partner Route-------------------------------------------------
Route::get('admin/PT','PageController@indexPT');
Route::post('admin/addPT','PartnerController@store');
Route::post('admin/editPT','PartnerController@edit');
Route::get('PTsearch','PartnerController@PTsearch');
Route::get('editPT','PartnerController@editPT');
Route::get('deletePT','PartnerController@Delete');
//------- Recruitment Route---------------------------------
Route::get('admin/RE','PageController@index_re');
Route::get('admin/RE/{id}','PageController@indexRE');
Route::post('admin/addRE','RecruitmentController@store');
Route::get('editRE','RecruitmentController@editRE');
Route::post('admin/edit','RecruitmentController@edit');
Route::get('REsearch','RecruitmentController@REsearch');
Route::get('searchRE','RecruitmentController@search');
Route::get('deleteRE','RecruitmentController@Delete');
//---------Tour Route---------------------------------------------------
Route::get('admin/TOUR','PageController@index_tour');
Route::get('admin/TOUR/{id}','PageController@indexTOUR');
Route::post('admin/addTOUR','TourController@store');
Route::get('editTOUR','TourController@editTOUR');
Route::post('admin/editTOUR','TourController@edit');
Route::get('TOURsearch','TourController@TOURsearch');
Route::get('searchTOUR','TourController@search');
Route::get('deleteTOUR','TourController@Delete');
//---------PTtype Route---------------------------------------------------
Route::get('admin/PTtype','PageController@indexPTtype');
Route::post('admin/addPTtype','PartnerTypeController@store');
Route::get('editPTtype','PartnerTypeController@editPTtype');
Route::post('admin/editPTtype','PartnerTypeController@edit');
Route::get('deletePTtype','PartnerTypeController@Delete');
