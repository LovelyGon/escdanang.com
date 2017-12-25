<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactModel;

class AdminContactController extends Controller
{
    public function index()
    {
    	$contacts = ContactModel::all();
        return view('admin.adminContact')->with('contacts', $contacts);

    }
    public function destroy(Request $rq)
    { 
      if($rq->ajax()){
        $id = $rq->id;
        $contact = ContactModel::find($id);
        $contact->delete();
      }
      $contacts = ContactModel::orderBy('id','desc')->get();
      $view = view('admin.ajaxContact')->with(['contacts'=>$contacts]);
      return response($view);
    } 

}
