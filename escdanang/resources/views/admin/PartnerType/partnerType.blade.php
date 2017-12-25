@extends('admin.admin_master')
@section('content_header')
  <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Partner Type</a></li>
      </ol>
  </section>
@stop
@section('content')
   <div class="row">
    <div class="col-xs-12">
      <div class="box" style="padding-bottom:10px ">
        <div class="box-body">
        <fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
          <legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">PARTNER TYPES</strong>
          </legend>
          <div style="margin: 10px" ><button  id="modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspAdd Partner Type</button>
          </div>
          <div style="margin: 10px" id="result">
             <table class="table table-bordered" id="result_table">
                   <thead>
                    <tr>
                        <th scope="col" class="th_center">STT</th>
                        <th scope="col" class="th_center">Name</th>
                        <th scope="col" class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody id="body">
                    @if(isset( $partner_types))
                    @foreach( $partner_types as  $partner_type)
                      <tr>
                         <td scope="col">{{$partner_type->id}}</td>
                         <td scope="col">{{$partner_type->name}}</td>
                         <td style="text-align: center"><a edit_id="{{$partner_type->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a delete_id="{{$partner_type->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
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
          <h4 class="modal-title"><strong>Add Partner Type</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="{{url('admin/addPTtype')}}" method="post" id="addPTtype" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namePTtype" name="namePTtype" style="width: -webkit-fill-available;">
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
          <h4 class="modal-title"><strong>Edit Partner Type</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="{{url('admin/editPTtype')}}" method="post" id="editPTtype" enctype="multipart/form-data">
            {!! csrf_field() !!}
             <input type="hidden" id="edit_id" name="edit_id">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namePTtype_edit" name="namePTtype" style="width: -webkit-fill-available;">
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
@include('admin.PartnerType.partnerTypejs')
@stop