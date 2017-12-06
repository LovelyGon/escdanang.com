@extends('admin.admin_master')
@section('content_header')
	<section class="content-header">
	    <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Enjoy your life</a></li>
      </ol>
	</section>
@stop
@section('content')
  <div class="row">
  	<div class="col-xs-12">
  		<div class="box" style="padding-bottom:10px ">
  			<div class="box-body">
  			<fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
  				<legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">Enjoy your life</strong></legend>
  				<div style="margin: 10px" ><button  id="modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Add Enjoy your life Service</button></div>
  				<div style="margin: 10px"><table class="table table-bordered">
                   <thead>
		                <tr>
		                    <th class="th_center">Services name</th>
		                    <th class="th_center">Short Description</th>
		                    <th class="th_center">Description</th>
		                    <th class="th_center">Action</th>
		                </tr>
                   </thead>
                   <tbody>
                     	<tr>
                     		<td class="td_center">1</td>
                     		<td class="td_center">2</td>
                     		<td class="td_center">2</td>
                     		<td class="td_center"><a href="" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                     	  <a href="" style="margin-left: 30px" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                     	</tr>
                      <tr>
                        <td class="td_center">1</td>
                        <td class="td_center">2</td>
                        <td class="td_center">2</td>
                        <td class="td_center"><a href=""><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="" style="margin-left: 30px" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                      <tr>
                        <td class="td_center">1</td>
                        <td class="td_center">2</td>
                        <td class="td_center">2</td>
                        <td class="td_center"><a href=""><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="" style="margin-left: 30px" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></ad></td>
                      </tr>
                   </tbody>
               </table></div> 
               	<a href=""><button class="btn btn-primary pull-right" style="margin-bottom: 20px;
    margin-right: 10px;"><span class="fa fa-reply"></span>BACK</button></a>
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
          <h4 class="modal-title"><strong>Add Enjoy your life Service</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="" method="get">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Short Description</label>
                  <div class="col-sm-10">
                    <textarea name="" id="" cols="10" rows="5" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Description</label>
                  <div class="col-sm-10">
                    <textarea name="add_description" id="" cols="10" rows="5" class="form-control"></textarea>
                    <script>CKEDITOR.replace('add_description');</script>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left"></label>
                  <div class="col-sm-10">
                  <input type="file" class="input09">
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save</button>
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
          <h4 class="modal-title"><strong>Edit Enjoy your life Service</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Short Description</label>
                  <div class="col-sm-10">
                    <textarea name="" id="" cols="10" rows="5" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Description</label>
                  <div class="col-sm-10">
                    <textarea name="edit_description" id="" cols="10" rows="5" class="form-control"></textarea>
                    <script>CKEDITOR.replace('edit_description');</script>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left"></label>
                  <div class="col-sm-10">
                  <input type="file" class="input09">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save</button>
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
  <script type="text/javascript" src="{{asset('js/bootstrap-filestyle.min.js')}}"> </script>
  <script>
   $('.input09').filestyle({
        text : 'Choose file',
        btnClass : 'btn-primary',
      });
  </script>
@stop
