<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner_Type;

class PartnerTypeController extends Controller
{
    public function store(Request $rq)
    {
    	$namePTtype = new Partner_Type;
    	$namePTtype->name = $rq->namePTtype;
    	$namePTtype->save();
    	$partner_types = Partner_Type::orderBy('id','desc')->get();
        $view = view('admin.PartnerType.viewPTtype')->with(['partner_types'=>$partner_types]);
    	return Response($view);
    }

    public function editPTtype(Request $rq)
    {
    	$id = $rq->id;
        $results = Partner_Type::find($id);
        return Response([$results->id,$results->name]);
    }

    public function edit(Request $rq)
    {
    	$id = $rq->edit_id;
    	$namePTtype = Partner_Type::find($id);
    	$namePTtype->name = $rq->namePTtype;
    	$namePTtype->save();
    	$partner_types = Partner_Type::orderBy('id','desc')->get();
    	$view = view('admin.PartnerType.viewPTtype')->with(['partner_types'=>$partner_types]);
    	return Response($view);
    }
     public function Delete(Request $rq)
     {
     	$id = $rq->id;
     	$namePTtype = Partner_Type::find($id);
     	$namePTtype->delete();
     	$partner_types = Partner_Type::orderBy('id','desc')->get();
    	$view = view('admin.PartnerType.viewPTtype')->with(['partner_types'=>$partner_types]);
    	return Response($view);
     }
}
