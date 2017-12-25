<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruitment;

class RecruitmentController extends Controller
{
    public function store(Request $rq)
    {   
        $add_status = $rq->add_status;
    	$recruitment = new Recruitment;
    	$recruitment->title = $rq->titleRE;
    	$recruitment->submit_date = $rq->submit_date;
    	$recruitment->description = $rq->short_desc;
    	$recruitment->content = $rq->content_hi_add;
    	$recruitment->position = $rq->positionRE;
    	$recruitment->expiry_date = $rq->expiryday;
    	$recruitment->partner_id = $rq->partner_id;
    	$recruitment->save();
        if($add_status==0){
            $recruitments =  Recruitment::orderBy('id','desc')->get();
        }else{
            $recruitments = Recruitment::where('partner_id',$recruitment->partner_id)->orderBy('id','desc')->get();
        }
    	$view = view('admin.Recruitment.viewRE')->with(['recruitments'=>$recruitments]);
    	return Response($view);
    }

    public function editRE(Request $rq)
    {   
        $id = $rq->id;
        $results = Recruitment::find($id);
        return Response([$results->id,$results->title,$results->submit_date,$results->description,$results->position,$results->expiry_date,$results->content]);
    }

    public function REsearch(Request $rq)
    {
        $PTname = $rq->PTname;
        if($PTname !='0'){
        $recruitments = Recruitment::where('partner_id',$PTname)->orderBy('id','desc')->get();
        }else{
        $recruitments = Recruitment::orderBy('id','desc')->get();
        }
        $view = view('admin.Recruitment.viewRE')->with(['recruitments'=>$recruitments]);
        return Response($view);
    }
    
    public function search(Request $rq)
    {
        $PTname = $rq->typePT;
        if($PTname !='0'){
        $recruitments = Recruitment::where('partner_id',$PTname)->orderBy('id','desc')->get();
        }else{
        $recruitments = Recruitment::orderBy('id','desc')->get();
        }
        $view = view('admin.Recruitment.viewRE')->with(['recruitments'=>$recruitments]);
        return Response($view);
    }



    public function edit(Request $rq)
    {   
        $id = $rq->id_edit;
        $edit_status = $rq->edit_status;
        $recruitment = Recruitment::find($id);
        $recruitment->title = $rq->titleRE;
        $recruitment->submit_date = $rq->submit_date;
        $recruitment->description = $rq->short_desc;
        $recruitment->content = $rq->content_hi_edit;
        $recruitment->position = $rq->positionRE;
        $recruitment->expiry_date = $rq->expiryday;
        $recruitment->save();
        if($edit_status == 0){
            $recruitments =  Recruitment::orderBy('id','desc')->get();
        }else{
            $recruitments = Recruitment::where('partner_id',$recruitment->partner_id)->orderBy('id','desc')->get();
        }
        $view = view('admin.Recruitment.viewRE')->with(['recruitments'=>$recruitments]);
        return Response($view);
    }

    public function Delete(Request $rq)
    {
        $id = $rq->id;
        $delete_status = $rq->a;
        $recruitment = Recruitment::find($id);
        $recruitment->delete(); 
        if($delete_status==0){
            $recruitments = Recruitment::orderBy('id','desc')->get();
        }else{
            $recruitments= Recruitment::where('partner_id',$delete_status)->orderBy('id','desc')->get();
        }
        $view = view('admin.Recruitment.viewRE')->with(['recruitments'=>$recruitments]);
        return Response($view);
    }
}
