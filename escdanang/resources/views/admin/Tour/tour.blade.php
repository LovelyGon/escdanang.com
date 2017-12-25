@extends('admin.admin_master')
@section('content_header')
  <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tour</a></li>
      </ol>
  </section>
@stop
@section('content')
   <div class="row">
    <div class="col-xs-12">
      <div class="box" style="padding-bottom:10px ">
        <div class="box-body">
        <fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
          <legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">TOURS</strong>
          </legend>
          <div style="margin: 10px" ><button  id="modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspAdd Tour</button>
            <div class="form-group pull-right">
               <label for="colFormLabelSm" class="col-sm-5 control-label" style="margin-top: 6px;font-size: 13px;">Select Partner name:</label>
               <div class="col-sm-7">
                   <select name="" id="PTtype" class="form-control">
                        <option value="0">-Choose Partner Name-</option>
                        @foreach($partners as $partner)
                        <option value="{{$partner->id}}">{{$partner->company_name}}</option>
                        @endforeach
                   </select>
               </div>
            </div>
          </div>
          <div style="margin: 10px" id="result">
             <table class="table table-bordered" id="result_table">
                   <thead>
                    <tr>
                        <th scope="col" class="th_center">Tour name</th>
                        <th scope="col" class="th_center">Description</th>
                        <th scope="col" class="th_center">Start day</th>
                        <th scope="col" class="th_center">End day</th>
                        <th scope="col" class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody id="body">
                    @if(isset($tours))
                    @foreach($tours as $tour)
                      <tr>
                         <td scope="col">{{substr($tour->tour_name,0,20)}}<span class="tooltip02" data-toggle="tooltip" data-placement="bottom" fulltext="{{$tour->tour_name}}">......</span></td>
                         <td scope="col">{!!substr($tour->description,0,20)!!}<span class="tooltip02" fulltext="{{$tour->description}}" data-toggle="tooltip" data-placement="bottom">.......</span></td>
                         <td scope="col" style="text-align: right;">{{$tour->start_date}}</td>
                         <td scope="col" style="text-align: right;">{{$tour->end_date}}</td>
                         <td style="text-align: center"><a edit_id="{{$tour->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a delete_id="{{$tour->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                    @endforeach
                    @endif 
                   </tbody>
                   <input type="hidden" id="nextpage" value="@if(isset($nextpage)){{{$nextpage}}}@else{{{' '}}}@endif">
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
          <h4 class="modal-title"><strong>Add Tour</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="{{url('admin/addTOUR')}}" method="post" id="addTOUR" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input type="hidden" id="add_status" name="add_status">
              <div class="box-body">
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Partner </label>
                  <div class="col-sm-10">
                    <select name="partner" class="form-control" id="select_id" style="width: -webkit-fill-available;">
                      <option value="Choose">-Choose Partner Name-</option>
                      @foreach($partners as $partner)
                      <option value="{{$partner->id}}">{{$partner->company_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Tour name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameTOUR" name="nameTOUR" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Start day</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="start_date" name="start_date" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">End day</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="end_date" name="end_date" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Description</label>
                  <div class="col-sm-10 ">
                     <textarea name="description" id="desc_TOUR" cols="20" rows="10" class="form-control" style="width: -webkit-fill-available;"></textarea>
                    <script>CKEDITOR.replace('desc_TOUR');</script>
                  </div>
                </div>
                <input type="hidden" id="content_hi_add" name="content_hi_add">
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" id="add_get_ckeditor">Save</button>
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
          <h4 class="modal-title"><strong>Edit Tour</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="{{url('admin/editTOUR')}}" method="post" id="editTOUR" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <input type="hidden" id="id_edit" name="id_edit">
              <input type="hidden" id="patner_id" name="patner_id">
              <input type="hidden" id="edit_status" name="edit_status">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Tour name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nametour" name="nameTOUR" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Start day</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="Start_date" name="start_date" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">End day</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="End_date" name="end_date" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Description</label>
                  <div class="col-sm-10 ">
                     <textarea name="desc" id="desc_tour" cols="20" rows="10" class="form-control" style="width: -webkit-fill-available;"></textarea>
                      <script>CKEDITOR.replace('desc_tour');</script>
                  </div>
                </div>
                <input type="hidden" id="content_hi_edit" name="content_hi_edit">
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" id="edit_get_ckeditor">Save</button>
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
@include('admin.Tour.tourjs')
@stop
 