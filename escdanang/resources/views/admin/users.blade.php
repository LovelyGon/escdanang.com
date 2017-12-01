@extends('admin.admin_master')
@section('content_header')
	<section class="content-header">
	    <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Legal Services</a></li>
        <li class="active">Simple</li>
      </ol>
	</section>
@stop
@section('content')
  <div class="row">
  	<div class="col-xs-12">
  		<div class="box" style="padding-bottom:10px ">
  			<div class="box-body">
  			<fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
  				<legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">Legal Services</strong></legend>
  				<div style="margin: 10px" ><a href=""><button class="btn btn-primary">Add Legal Service</button></a></div>
  				<div style="margin: 10px"><table class="table table-bordered">
                   <thead>
		                <tr>
		                    <th>Services name</th>
		                    <th>Short Description</th>
		                    <th>Description</th>
		                    <th>Edit</th>
		                    <th>Delete</th>
		                </tr>
                   </thead>
                   <tbody>
                     	<tr>
                     		<td>1</td>
                     		<td>2</td>
                     		<td>2</td>
                     		<td><a href=""><span class="glyphicon glyphicon-pencil"></span></a>
                     		</td>
                     		<td><a href=""><span class="glyphicon glyphicon-trash"></span></a></td>
                     	</tr>
                     	<tr>
                     		<td>1</td>
                     		<td>2</td>
                     		<td>2</td>
                     		<td><a href=""><span class="glyphicon glyphicon-pencil"></span></a>
                     		</td>
                     		<td><a href=""><span class="glyphicon glyphicon-trash"></span></a></td>
                     	</tr>
                     	<tr>
                     		<td>1</td>
                     		<td>2</td>
                     		<td>2</td>
                     		<td><a href=""><span class="glyphicon glyphicon-pencil"></span></a>
                     		</td>
                     		<td><a href=""><span class="glyphicon glyphicon-trash"></span></a></td>
                     	</tr>
                   </tbody>
               </table></div> 
               	<a href=""><button class="btn btn-primary pull-right" style="margin-bottom: 20px;
    margin-right: 10px;">BACK</button></a>
  			</fieldset>
  		</div>
  		</div>
  	</div>
  </div>
@stop