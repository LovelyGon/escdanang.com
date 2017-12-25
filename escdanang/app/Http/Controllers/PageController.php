<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\LegalServicesModel;
use App\Recruitment;
use App\Partner_Type;
use App\Partner;
use App\Tour;

class PageController extends Controller
{

    public function indexSV()
    {
        $services = LegalServicesModel::orderBy('id','desc')->get();
        return view('admin.Service.services')->with(['services'=>$services]);
    }
    
    public function indexPT()
    { 
        $partners = Partner::orderBy('id','desc')->get();
        $typePns  = Partner_Type::all();
        return view('admin.Partner.partner')->with(['partners'=>$partners,'typePns'=>$typePns]);
    }
    

    public function index_re()
    {
        $recruitments = Recruitment::orderBy('id','desc')->get();
        $partners     = Partner::all();
        return view('admin.Recruitment.recruitment')->with(['recruitments'=>$recruitments,'partners'=>$partners]);
    }

    public function indexRE($id)
    {   
        $nextpage = Partner::find($id)->company_name;
        $recruitments = Recruitment::orderBy('id','desc')->get();
        $partners     = Partner::all();
        return view('admin.Recruitment.recruitment')->with(['recruitments'=>$recruitments,'partners'=>$partners ,'nextpage'=>$nextpage]);
    }

     public function index_tour()
     {  
        $tours = Tour::orderBy('id','desc')->get();
        $partners = Partner::all();
        return view('admin.Tour.tour')->with(['tours'=>$tours,'partners'=>$partners]);
     }

    public function indexTOUR($id)
     {  
        $nextpage = Partner::find($id)->company_name;
        $tours = Tour::orderBy('id','desc')->get();
        $partners = Partner::all();
        return view('admin.Tour.tour')->with(['tours'=>$tours,'partners'=>$partners,'nextpage'=>$nextpage]);
     }

    public function indexPTtype()
     {  
        $partner_types = Partner_Type::orderBy('id','desc')->get();
        return view('admin.PartnerType.partnerType')->with(['partner_types'=>$partner_types]);
     }

   
}
