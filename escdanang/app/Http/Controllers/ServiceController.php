<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LegalServicesModel;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function store(Request $rq)
    {  
    	
	    $service = new LegalServicesModel;
	    $service ->service_name = $rq ->nameSV;
	    $service ->type_of_service = $rq ->typeSV;
	    $service ->price = $rq ->priceSV;
	    $service ->short_description = $rq ->desc_Short;
	    $service ->description = $rq ->description;
	    if ($rq->hasFile('imageSV') )
        {
            $file = $rq->file('imageSV');
            $filename = $file->getClientOriginalName();
            $images = time(). "_" . $filename;
            $destinationPath = public_path('images');
            $file->move($destinationPath, $images);
            $service->image = $images;
        }
         $service ->save();
         return redirect('admin/services');
    }

    public function getEdit(Request $rq)
    {   
        if($rq->ajax()){
           $id =$rq->id;
           $editSV = LegalServicesModel::find($id);
           $result =[$editSV->service_name,$editSV->price,$editSV->short_description,$editSV->description,$editSV->id];
       }
       return Response($result);
    }

    public function Edit(Request $rq)
    {  
        $id = $rq->id_edit;
       $services = LegalServicesModel::find($id);
       $services->service_name = $rq->nameSV;
       $services->price = $rq->priceSV;
       $services->short_description = $rq->desc_Short;
       $services->description = $rq->description;
       $type = $rq->typeSV;
       if($type != '0'){ $u=$services->type_of_service = $type;}
       if ($rq->hasFile('imageSV') )
        {
            $file = $rq->file('imageSV');
            $filename = $file->getClientOriginalName();
            $images = time(). "_" . $filename;
            $destinationPath = public_path('images');
            $file->move($destinationPath, $images);
            $oldfile = $services->image;
            Storage::delete($oldfile);
            $services->image = $images;
        }
        $services->save();
        return redirect('admin/services');
    }

    public function Delete($id)
    {
      $services = LegalServicesModel::find($id);
      $oldfile = $services->image;
      Storage::delete($oldfile);
      $services->delete();
      return redirect('admin/services');
    }

    public function index()
    {
        $services = LegalServicesModel::orderBy('id','desc')->paginate(3);
        return view('admin/services')->with(['services'=>$services]);
    }
}
