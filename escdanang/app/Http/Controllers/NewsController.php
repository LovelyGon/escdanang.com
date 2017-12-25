<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id','desc')->get();
        return view('admin.news')->with(['news'=>$news]);
    }
    public function store(Request $rq)
    {
    	$data = $request->all();
        $new_er = News::create($data);
         return response()->json($new_er);
    }
    // public function edit($id)
    // {
    //     $new_er = News::find($id);
    //     return view('admin.news')
    //     ->with('new_er', $new_er);
        
    // }
    // public function update(Request $request, $id)
    //  {
   
    //     $data = $request->all();
    //     $new_er = News::find($id);
    //     $new_er->update($data);
    //     return response()->json($new_er);
    // }
    // public function show($id)
    // {
    //     $new_er = Customer::find($id);
    //     return response()->json($new_er);
    // }
    
}    