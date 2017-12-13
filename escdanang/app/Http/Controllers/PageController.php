<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LegalServicesModel;

class PageController extends Controller
{
    public function index()
    {
        $services = LegalServicesModel::orderBy('id','desc')->get();
        return view('admin/services')->with(['services'=>$services]);
    }
    
}
