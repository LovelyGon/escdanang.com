<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Partner;
use App\Recruitment;
use App\Partner_Type;
use App\Tour;

class PartnerController extends Controller
{
    public function store(Request $rq)
    {   
        $add_status = $rq->add_status;
        $partner = new Partner;
        $partner ->company_name = $rq->namePT;
        $partner ->address = $rq->addressPT;
        $partner ->partnerType = $rq->typePT;
        $partner ->email = $rq->emailPT;
        $partner ->website = $rq->webPT;
        $partner ->phone = $rq->phonePT;
        $file = $rq->logoPT;
        if($file != ''){
          $filename =$file->getClientOriginalName();
          $images = time(). "_" . $filename;
          $destinationPath = public_path('images');
          $file->move($destinationPath, $images);
          $partner->image = $images;
        }
        $partner->save();
        if($add_status==0){
          $partners = Partner::orderBy('id','desc')->get();
         }else{
           $partners = Partner::where('partnerType',$partner->partnerType)->orderBy('id','desc')->get();
         }
        $view = view('admin.Partner.viewPT')->with(['partners'=> $partners]);
        return Response($view);
    }

    public function PTsearch(Request $rq)
    {
        $typePT = $rq->typePT;
        if($typePT != '0'){
        $partners  = Partner::where('partnerType',$typePT)->orderBy('id','desc')->get();
        }else{
        $partners = Partner::orderBy('id','desc')->get();
        }
        $view = view('admin.Partner.viewPT')->with(['partners'=> $partners]);
        return Response($view);
    }

    public function editPT(Request $rq)
    {
        $id = $rq->id;
        $results = Partner::find($id);
        $pntype = Partner_Type::find($results->partnerType);
        return Response([$results->id,$results->company_name,$results->address,$pntype->name,$results->email,$results->website,$results->phone]);
    }

    public function edit(Request $rq)
    {
        $id = $rq->id_edit_PT;
        $edit_status = $rq->edit_status;
        $partner = Partner::find($id);
        $partner ->company_name = $rq->namept;
        $partner ->address = $rq->addresspt;
        $test = $rq->typept;
        if($test !='0'){
           $partner ->partnerType =  $test;
        }
        $partner ->email = $rq->emailpt;
        $partner ->website = $rq->webpt;
        $partner ->phone = $rq->phonept;
        $file = $rq->logopt;
        if($file != ''){
          $filename =$file->getClientOriginalName();
          $images = time(). "_" . $filename;
          $destinationPath = public_path('images');
          $file->move($destinationPath, $images);
          $oldfile = $partner->image;
          Storage::delete($oldfile);
          $partner->image = $images;
        }  
        $partner->save();
        if($edit_status==0){
            $partners  = Partner::orderBy('id','desc')->get();
         }else{
            $partners  = Partner::where('partnerType', $partner ->partnerType)->orderBy('id','desc')->get();
         }
        $view = view('admin.Partner.viewPT')->with(['partners'=>$partners ]);
        return Response($view);
    }
     public function Delete(Request $rq)
     {
        $id = $rq->id;
        $dele_status = $rq->de_status;
        $recruitments = Recruitment::where('partner_id',$id)->get();
        foreach($recruitments as $recruitment){
           $re_delete = Recruitment::find($recruitment->id);
           $re_delete->delete();
        }
        $tours = Tour::where('partner_id',$id)->get();
        foreach($tours as $tour){
           $tu_delete = Tour::find($tour->id);
           $tu_delete->delete();
        }
       $partner = Partner::find($id);
       $oldfile = $partner->image;
        Storage::delete($oldfile);
        $partner->delete();
       if($dele_status==0){
         $partners = Partner::orderBy('id','desc')->get();
       }else{
          $partners  = Partner::where('partnerType',$dele_status)->orderBy('id','desc')->get();
       }
       $view = view('admin.Partner.viewPT')->with(['partners'=>$partners]);
       return Response($view);
    }
}
