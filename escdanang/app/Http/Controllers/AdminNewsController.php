<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id','desc')->get();
        return view('admin.adminNews')->with(['news'=>$news]);
    }
    public function store(Request $rq)
    {
      $new_er = new News;
      $new_er ->title = $rq ->title;
      $new_er ->type = $rq ->type;
      $new_er ->start_date = $rq ->start;
      $new_er ->end_date = $rq ->end;
      $new_er ->short_description = $rq ->short_description;
      $input = $rq->content;
       $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Loại bỏ javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Loại bỏ HTML tags
        '@<style[^>]*?>.*?</style>@siU',    // Loại bỏ style tags
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Loại bỏ multi-line comments
      );
      $new_er->content = preg_replace($search, '', $input);    
      $file = $rq->image;
         if($file != ''){
          $filename =$file->getClientOriginalName();
          $images = time(). "_" . $filename;
          $destinationPath = public_path('images');
          $file->move($destinationPath, $images);
          $new_er->image = $images;
        }
        $new_er ->save();
        $news = News::orderBy('id','desc')->get();
      $view = view('admin.ajaxNews')->with(['news'=>$news]);
      return Response($view);
    }

 //------------------------------------------------------------------------------------------
    public function edit(Request $rq)// function get data for edit form
    {   
        if($rq->ajax()){
           $id =$rq->id;
           $edit = News::find($id);
           $result =[$edit->title,$edit->type,$edit->image,$edit->short_description,$edit->start,$edit->end,$edit->id];
       }
       return Response($result);
    }
//------------------------------------------------------------------------------------------
    public function update(Request $rq)//edit by ajax
    {  
      $id = $rq->id_edit;
      $new_er =News::find($id);
      $new_er ->title = $rq ->title;
      $new_er ->type = $rq ->type;
      $new_er ->start = $rq ->start;
      $new_er ->end = $rq ->end;
      $new_er ->short_description = $rq ->short_description;
      $input = $rq->content;
      $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Loại bỏ javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Loại bỏ HTML tags
        '@<style[^>]*?>.*?</style>@siU',    // Loại bỏ style tags
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Loại bỏ multi-line comments
      );
      $new_er->content = preg_replace($search, '', $input); 
      $file = $rq->image;
        if($file != ''){
          $filename =$file->getClientOriginalName();
          $images = time(). "_" . $filename;
          $destinationPath = public_path('images');
          $file->move($destinationPath, $images);
          $oldfile = $service->image;
          Storage::delete($oldfile);
          $new_er->image = $images;
      }
      $new_er->save();
      $news = News::orderBy('id','desc')->get();
      $view = view('admin.ajaxNews')->with(['news'=>$news]);
      return Response($view);
    }
// //------------------------------------------------------------------------------------
    public function destroy(Request $rq)
    { 
      if($rq->ajax()){
        $id = $rq->id;
        $new_er = News::find($id);
        $new_er->delete();
      }
      $news = News::orderBy('id','desc')->get();
      $view = view('admin.ajaxNews')->with(['news'=>$news]);
      return response($view);
    }
   
 }
