@extends('admin.admin_master')
@section('content_header')
	<section class="content-header">
	    <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">News</a></li>
      </ol>
	</section>
@stop
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box" style="padding-bottom:10px ">
        <div class="box-body">
        <fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
          <legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">News</strong></legend>
          <div style="margin: 15px" ><button   class="btn btn-primary" id="btn_add"><span class="glyphicon glyphicon-plus"></span>Add news</button></div>
          <div style="margin: 15px" id="result">

          <table class="table table-striped table-bordered table-hover" id="result_table">
                   <thead>
                    <tr >
                        <th class="th_center">Title</th>
                        <th class="th_center">Type</th>
                        <th class="th_center">Short description</th>
                        <th class="th_center">Content</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody id="news_list" name="news_list">
                   
                      @foreach($news as $new_er)
                      <tr id="news{{$new_er->id}}">
                        <td class="text-left">{{ $new_er->title }}</td>
                            <td class="text-left">{{ $new_er->type }}</td>
                            <td class="text-left">{{ $new_er->short_description }}</td>
                            <td class="text-left">{{substr($new_er->content,0,50)}}</td>
                            
                        <td class="text-center"><a value="{{$new_er->id}}" class="edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href=""  style="margin-left: 8px" value="{{$new_er->id}}" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                      @endforeach
                  
                   </tbody>
               </table>
             </div>
         

            <div style="display: block;">
               <a href=""><button class="btn btn-primary pull-right " style="margin-bottom: 10px;
   margin-right: 15px;    margin-top: -10px; display: block;"><span class="fa fa-reply"></span>BACK</button></a>
            </div>

                 
               
        </fieldset>
      </div>
      </div>
    </div>
  </div>


  


   <!--   Modal  Add-->
  <div class="modal fade" id="myModal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Add News</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="" method="post" id="addNews" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                 <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Type</label>
                  <div class="col-sm-10">
                     <select name="type" class="form-control" id="type">
                      <option value="0" id="op_id">--Choose News--</option>
                      <option value="news"> News</option>
                      <option value="promotion" >Promotion</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style=" width: 686px;" id="title" name="title">
                  </div>
                </div>
                <div class="form-group" id="hide">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Start date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" style=" width: 686px;" id="start" name="start">
                  </div>
                </div>
                <div class="form-group"  id="hide1">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">End date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" style=" width: 686px;" id="end" name="end">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">short description</label>
                  <div class="col-sm-10">
                    <textarea name="short_description" id="short_description" cols="20" rows="5" class="form-control" style="width: -webkit-fill-available;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Content</label>
                  <div class="col-sm-10 " id="desc_error">
                    <textarea name="content" id="add_desc" cols="10" rows="5" class="form-control" ></textarea>
                    <script>CKEDITOR.replace('add_desc');</script>
                  </div>
                </div>
               
                 <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left"></label>
                  <div class="col-sm-10" id="demo" >
                  <input type="file" class="input09" name="image" id="image"> 
                  </div>
                </div>
                </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" value="add" id="save">Save</button>
                <button type="button" class="btn btn-default pull-right" style="margin-right: 10px" data-dismiss="modal">Cancel</button> 
                <input type="hidden" name="id_edit"  id="id_edit">
 
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
      </div>
    </div>
  </div> 

 @stop

 @sectiom('script')
<script>
  


</script>
 @stop