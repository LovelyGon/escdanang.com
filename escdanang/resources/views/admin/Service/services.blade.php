  @extends('admin.admin_master')
@section('content_header')
	<section class="content-header">
	    <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Service</a></li>
      </ol>
	</section>
@stop
@section('content')
  <div class="row">
  	<div class="col-xs-12">
  		<div class="box" style="padding-bottom:10px ">
  			<div class="box-body">
  			<fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
  				<legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">SERVICES</strong></legend>
  				<div style="margin: 10px" ><button  id="modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspAdd Service</button></div>
  				<div style="margin: 10px" id="result">
          <!--   content of table -->
            <table class="table table-bordered" id="result_table">
                   <thead>
                    <tr>
                        <th class="th_center" scope="col">Services name</th>
                        <th class="th_center" scope="col">Services price</th>
                        <th class="th_center" scope="col">Services type</th>
                        <th class="th_center" scope="col">Short Description</th>
                        <th class="th_center" scope="col">Description</th>
                        <th class="th_center" scope="col">Action</th>
                    </tr>
                   </thead>
                   <tbody id="body">
                    @if(isset($services))
                      @foreach($services as $sv)
                      <tr>
                        <td scope="col">{{substr($sv->service_name,0,15)}}<span class="tooltip02" fulltext="{{$sv->service_name}}">......</span></td>
                        <td scope="col" style="text-align: right">{{$sv->price}}</td>
                        <td scope="col">{{$sv->type_of_service}}</td>
                        <td scope="col">{{substr($sv->short_description,0,15)}}<span  class="tooltip02" fulltext="{{$sv->short_description}}">.....</span></td>
                        <td scope="col">{!!substr($sv->description,0,15)!!}<span  class="tooltip02" fulltext="{{$sv->description}}">.....</span></td>
                        <td scope="col" style="text-align: center"><a edit_id="{{$sv->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a delete_id="{{$sv->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
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
          <h4 class="modal-title"><strong>Add Service</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="{{url('admin/addSV')}}" method="post" id="addSV" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameSV" name="nameSV" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service type</label>
                  <div class="col-sm-10">
                    <select name="typeSV" class="form-control" id="typeSV" style="width: -webkit-fill-available;">
                      <option value="Legal Service"> Legal Service</option>
                      <option value="Enjoy your life Service"> Enjoy your life Service</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="priceSV" name="priceSV" style="width: -webkit-fill-available;">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Short Description</label>
                  <div class="col-sm-10">
                    <textarea name="desc_Short" id="desc_Short" cols="20" rows="5" class="form-control" style="width: -webkit-fill-available;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Description</label>
                  <div class="col-sm-10 " id="desc_error">
                    <textarea name="description" id="add_desc" cols="10" rows="5" class="form-control" ></textarea>
                    <script>CKEDITOR.replace('add_desc');</script>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left">Logo</label>
                  <div class="col-sm-10" id="demo" >
                  <input type="file" class="input09" name="imageSV" id="imageSV"> 
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
          <h4 class="modal-title"><strong>Edit Service</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" id="editSV" action="{{url('admin/editSV')}}" method="post" enctype="multipart/form-data">
             {!! csrf_field() !!}
             <input type="hidden" name="id_edit"  id="id_edit">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namesv" name="nameSV" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service type</label>
                  <div class="col-sm-10">
                    <select name="typeSV" class="form-control" id="select_id" style="width: -webkit-fill-available;">
                      <option value="0" id="op_id"></option>
                      <option value="Legal Service"> Legal Service</option>
                      <option value="Enjoy your life Service"> Enjoy your life Service</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pricesv" name="priceSV" style="width: -webkit-fill-available;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Short Description</label>
                  <div class="col-sm-10">
                   <textarea name="desc_Short" id="edesc_Short" cols="20" rows="5" class="form-control" style="width: -webkit-fill-available;" ></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" id="edit_desc" cols="10" rows="5" class="form-control" ></textarea>
                    <script>CKEDITOR.replace('edit_desc');</script>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left">Logo</label>
                  <div class="col-sm-10">
                  <input type="file" class="input09" name="imageSV">
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
@include('admin.Service.servicesjs')
@stop
