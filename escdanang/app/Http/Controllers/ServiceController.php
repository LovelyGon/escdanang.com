<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LegalServicesModel;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class ServiceController extends Controller
{
//------------------------------------------------------------------------------------
    public function store(Request $rq) // function add SV by ajax
    {
      $service = new LegalServicesModel;
      $service ->service_name = $rq ->nameSV;
      $service ->type_of_service = $rq ->typeSV;
      $service ->price = $rq ->priceSV;
      $service ->short_description = $rq ->desc_Short;
      $service->description = $rq->content_hi_add;    
      $file = $rq->imageSV;
        if($file != ''){
          $filename =$file->getClientOriginalName();
          $images = time(). "_" . $filename;
          $destinationPath = public_path('images');
          $file->move($destinationPath, $images);
          $service->image = $images;
        }
      $service ->save();
      $services = LegalServicesModel::orderBy('id','desc')->get();
      $view = view('admin.Service.viewajax')->with(['services'=>$services]);
      return Response($view);
    }
//------------------------------------------------------------------------------------------
    public function getEdit(Request $rq)// function get data for edit form
    {   
        if($rq->ajax()){
           $id =$rq->id;
           $editSV = LegalServicesModel::find($id);
           $result =[$editSV->service_name,$editSV->price,$editSV->short_description,$editSV->description,$editSV->id,$editSV->type_of_service];
       }
       return Response($result);
    }
//------------------------------------------------------------------------------------------
    public function Edit(Request $rq)//edit by ajax
    {  
      $id = $rq->id_edit;
      $service =LegalServicesModel::find($id);
      $service ->service_name = $rq ->nameSV;
      $test = $rq ->typeSV;
      if($test !='0'){
        $service ->type_of_service =$test;
      }
      $service ->price = $rq ->priceSV;
      $service ->short_description = $rq ->desc_Short;
      $service->description = $rq->content_hi_edit; 
      $file = $rq->imageSV;
        if($file != ''){
          $filename =$file->getClientOriginalName();
          $images = time(). "_" . $filename;
          $destinationPath = public_path('images');
          $file->move($destinationPath, $images);
          $oldfile = $service->image;
          Storage::delete($oldfile);
          $service->image = $images;
        }  
      $service->save();
      $services = LegalServicesModel::orderBy('id','desc')->get();
      $view = view('admin.Service.viewajax')->with(['services'=>$services]);
      return Response($view);
    }
//------------------------------------------------------------------------------------
    public function Delete(Request $rq)
    { 
      if($rq->ajax()){
        $id = $rq->id;
        $service = LegalServicesModel::find($id);
        $oldfile = $service->image;
        Storage::delete($oldfile);
        $service->delete();
      }
      $services = LegalServicesModel::orderBy('id','desc')->get();
      $view = view('admin.Service.viewajax')->with(['services'=>$services]);
      return Response($view);
    }
}
