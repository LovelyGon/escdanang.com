@extends('admin.admin_master')
@section('content_header')
  <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Partner</a></li>
      </ol>
  </section>
@stop
@section('content')
   <div class="row">
    <div class="col-xs-12">
      <div class="box" style="padding-bottom:10px ">
        <div class="box-body">
        <fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
          <legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">PARTNERS</strong>
          </legend>
          <div style="margin: 10px" ><button  id="modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspAdd Partner</button>
            <div class="form-group pull-right">
               <label for="colFormLabelSm" class="col-sm-5 control-label" style="margin-top: 6px; font-size: 13px;">Select Partner Type:</label>
               <div class="col-sm-7">
                   <select name="" id="PTtype" class="form-control">
                      <option value="0">-Choose Partner Type-</option>
                      @foreach($typePns as $typePn)
                      <option value="{{$typePn->id}}">{{$typePn->name}}</option>
                      @endforeach
                   </select>
               </div>
            </div>
          </div>
          <div style="margin: 10px" id="result">
             <table class="table table-bordered" id="result_table">
                   <thead>
                    <tr>
                        <th scope="col" class="th_center">Partner name</th>
                        <th scope="col" class="th_center">Address</th>
                        <th scope="col" class="th_center">Email</th>
                        <th scope="col" class="th_center">Phone number</th>
                        <th scope="col" class="th_center">Tours</th>
                        <th scope="col" class="th_center">Recruitments</th>
                        <th scope="col" class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody id="body">
                    @if(isset($partners))
                    @foreach($partners as $partner)
                      <tr>
                         <td scope="col">{{substr($partner->company_name,0,30)}}<span class="tooltip02" fulltext="{{$partner->company_name}}">.....</span></td>
                         <td scope="col">{{substr($partner->address,0,30)}}<span class="tooltip02" fulltext="{{$partner->address}}">...</span></td>
                         <td scope="col">{{$partner->email}}</td>
                         <td scope="col" style="text-align: right;">{{$partner->phone}}</td>
                         <td scope="col" style="text-align: center"><a class="fo3" status="{{$partner->company_name}}" href="{{url('admin/TOUR')}}/{{$partner->id}}">Tours</a></td>
                         <td scope="col" style="text-align: center"><a class="fo3" status="{{$partner->company_name}}" href="{{url('admin/RE')}}/{{$partner->id}}">Recruitments</a></td>
                         <td style="text-align: center"><a edit_id="{{$partner->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a delete_id="{{$partner->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                    @endforeach
                    @endif 
                   </tbody>
             </table>
          </div>
          <a class="back"><button class="btn btn-primary pull-right" style="margin-bottom: 20px;
    margin-right: 10px;"><span class="fa fa-reply"></span>&nbsp&nbspBACK</button></a>
        </fieldset>
      </div>
      </div>
    </div>
  </div>
  <!--   Modal  Add-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Add Partner</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="{{url('admin/addPT')}}" method="post" id="addPT" enctype="multipart/form-data">
            {!! csrf_field() !!}
             <input type="hidden" id="add_status" name="add_status">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Partner name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namePT" name="namePT" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Partner type</label>
                  <div class="col-sm-10">
                    <select name="typePT" class="form-control" id="select_id" style="width: -webkit-fill-available;">
                      <option value="Choose">-Choose Partner Type-</option>
                      @foreach($typePns as $typePn)
                      <option value="{{$typePn->id}}">{{$typePn->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="addressPT" name="addressPT" style="width: -webkit-fill-available;">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="emailPT" name="emailPT" style="width: -webkit-fill-available;">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Phone number</label>
                  <div class="col-sm-10 " id="desc_error">
                    <input type="text" class="form-control" id="phonePT" name="phonePT" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Website</label>
                  <div class="col-sm-10 " id="desc_error">
                    <input type="text" class="form-control" id="webPT" name="webPT" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left">Logo</label>
                  <div class="col-sm-10" id="demo" >
                  <input type="file" class="input09" name="logoPT"> 
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" id="add_SV">Save</button>
                <button type="button" class="btn btn-default pull-right" style="margin-right: 10px" data-dismiss="modal">Cancel</button>  
              </div>
              <!-- /.box-footer -->
          </form>
        </div>
      </div>
    </div>
  </div> 
  <!--   Modal  Edit-->
  <div class="modal fade" id="myModal_Edit" role="dialog">
    <div class="modal-dialog modal-lg"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Edit Partner</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="{{url('admin/editPT')}}" method="post" id="editPT" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <input type="hidden" id="id_edit_PT" name="id_edit_PT">
              <input type="hidden" id="edit_status" name="edit_status">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Partner name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namept" name="namept" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Partner type</label>
                  <div class="col-sm-10">
                    <select name="typept" class="form-control" id="select_id" style="width: -webkit-fill-available;">
                      <option value="0" id="op_type"></option>
                      @foreach($typePns as $typePn)
                      <option value="{{$typePn->id}}">{{$typePn->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="addresspt" name="addresspt" style="width: -webkit-fill-available;">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="emailpt" name="emailpt" style="width: -webkit-fill-available;">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Phone number</label>
                  <div class="col-sm-10 " id="desc_error">
                    <input type="text" class="form-control" id="phonept" name="phonept" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Website</label>
                  <div class="col-sm-10 " id="desc_error">
                    <input type="text" class="form-control" id="webpt" name="webpt" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left">Logo</label>
                  <div class="col-sm-10" id="demo" >
                  <input type="file"  name="logopt" id="logoPT"> 
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" id="add_SV">Save</button>
                <button type="button" class="btn btn-default pull-right" style="margin-right: 10px" data-dismiss="modal">Cancel</button>  
              </div>
              <!-- /.box-footer -->
          </form>
        </div>
      </div>
    </div>
  </div> 
@stop
@section('script')
@include('admin.Partner.partnerjs')
@stop