<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\ Partner ;

class TourController extends Controller
{
    public function store(Request $rq)
    {   
        $add_status = $rq->add_status;
    	$tour = new Tour;
    	$tour->tour_name = $rq->nameTOUR;
        $tour->start_date = $rq->start_date;
        $tour->end_date = $rq->end_date; 
        $tour->description = $rq->content_hi_add;
    	$tour->partner_id = $rq->partner;
    	$tour->save();
        if($add_status==0){
            $tours = Tour::orderBy('id','desc')->get();
        }else{
            $tours = Tour::where('partner_id',$tour->partner_id)->orderBy('id','desc')->get();
        }
    	$view = view('admin.Tour.viewTOUR')->with(['tours'=>$tours]);
    	return Response($view );
    }

    public function editTour(Request $rq)
    {  
        $id = $rq->id;
        $tour = Tour::find($id);
        $partner = Partner::find($tour->partner_id);
        return Response([$tour->id, $tour->tour_name ,$partner->company_name,$tour->description,$tour->start_date,$tour->end_date,$partner->id]);
    }

    public function edit(Request $rq)
    {   
        $edit_status = $rq->edit_status;
        $id = $rq->id_edit;
        $patner_id = $rq->patner_id;
        $tour = Tour::find($id);
        $tour->tour_name = $rq->nameTOUR;
        $tour->start_date = $rq->start_date;
        $tour->end_date = $rq->end_date;
        $tour->description = $rq->content_hi_edit; 
        $tour->save();
        if($edit_status==0){
           $tours = Tour::orderBy('id','desc')->get();
        }else{
           $tours = Tour::where('partner_id',$tour->partner_id)->orderBy('id','desc')->get();
        }
        $view = view('admin.Tour.viewTOUR')->with(['tours'=>$tours]);
        return Response($view);
    }

    public function Delete(Request $rq)
    {
        $id = $rq->id;
        $delete_status = $rq->a;
        $tour = Tour::find($id);
        $tour->delete();
        if($delete_status==0){
            $tours = Tour::orderBy('id','desc')->get();
        }else{
            $tours = Tour::where('partner_id',$tour->partner_id)->orderBy('id','desc')->get();
        }
        $view = view('admin.Tour.viewTOUR')->with(['tours'=>$tours]);
        return Response($view);
    }

    public function TOURsearch(Request $rq)
    {
        $typePT = $rq->typePT;
        if($typePT !='0'){
        $tours = Tour::where('partner_id',$typePT)->orderBy('id','desc')->get();
        }else{
        $tours = Tour::orderBy('id','desc')->get();
        }
        $view = view('admin.Tour.viewTOUR')->with(['tours'=>$tours]);
        return Response($view);
    }

    public function search(Request $rq)
    {
        $typePT = $rq->typePT;
        if($typePT !='0'){
        $tours = Tour::where('partner_id',$typePT)->orderBy('id','desc')->get();
        }else{
        $tours = Tour::orderBy('id','desc')->get();
        }
        $view = view('admin.Tour.viewTOUR')->with(['tours'=>$tours]);
        return Response($view);
    }
}
