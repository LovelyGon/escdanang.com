<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;


class AdminCustomerController extends Controller
{
    public function store(Request $rq) // function add SV by ajax
    {
      $customer = new Customer;
      $customer ->name = $rq ->name;
      $customer ->phone = $rq ->phone;
      $customer ->address = $rq ->address;
      $customer ->email = $rq ->email;
      $customer ->facebook = $rq ->facebook;
      $customer ->save();
      $customers = Customer::orderBy('id','desc')->get();
      $view = view('admin.ajaxcustomer')->with(['customers'=>$customers]);
      return Response($view);
    }
//------------------------------------------------------------------------------------------
    public function edit(Request $rq)// function get data for edit form
    {   
        if($rq->ajax()){
           $id =$rq->id;
           $edit = Customer::find($id);
           $result =[$edit->name,$edit->phone,$edit->address,$edit->email,$edit->facebook,$edit->id];
       }
       return Response($result);
    }
//------------------------------------------------------------------------------------------
    public function update(Request $rq)//edit by ajax
    {  
         
    $id = $rq->id_edit;     
    $customer =Customer::find($id);
    $customer ->name = $rq ->name;
    $customer ->phone = $rq ->phone;
    $customer ->address = $rq ->address;
    $customer ->email = $rq ->email;
   $customer ->facebook = $rq ->facebook;
    $customer->save();
   $customers = Customer::orderBy('id','desc')->get();
   $view = view('admin.ajaxcustomer')->with(['customers'=>$customers]);
      return Response($view);
    }
//------------------------------------------------------------------------------------
    public function destroy(Request $rq)
    { 
      if($rq->ajax()){
        $id = $rq->id;
        $customer = Customer::find($id);
        $customer->delete();
      }
      $customers = Customer::orderBy('id','desc')->get();
      $view = view('admin.ajaxcustomer')->with(['customers'=>$customers]);
      return response($view);
    }
//----------------------------------------------------------------------------------------    
    public function index()
    {
        $customers = Customer::orderBy('id','desc')->get();
        return view('admin.customers')->with(['customers'=>$customers]);
    }
}



    
   
    
    

