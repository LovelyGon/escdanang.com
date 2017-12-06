<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  LegalServicesModel;

class ServiceController extends Controller
{
    public function store( Request $rq)
    {
       $services =new ServiceController;
       $services->service_name = $rq->name;
       $services->service_name = $rq->name;
       $services->short_description = $rq->short_description;
       $services->description = $rq->add_description;

    }
}
