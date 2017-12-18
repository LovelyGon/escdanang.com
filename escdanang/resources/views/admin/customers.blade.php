@extends('admin.admin_master')
@section('content_header')
	<section class="content-header">
	    <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customer</a></li>
      </ol>
	</section>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
      <div class="box" style="padding-bottom:10px ">
        <div class="box-body">
        <fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
          <legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">Customer</strong></legend>
          <div style="margin: 15px" ><button  id="modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" id="btn_add"></span>Add customer</button></div>
          <div style="margin: 15px" id="result">

          <table class="table table-striped table-bordered table-hover" id="result_table">
                   <thead>
                    <tr >
                        <th class="th_center">Customer name</th>
                        <th class="th_center">Phone</th>
                        <th class="th_center">Address</th>
                        <th class="th_center">Email</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody  id="customers-list" name="customers-list">
                   
                      @foreach($customers as $customer)
                      <tr id="customer{{$customer->id}}">
                        <td class="text-left">{{ $customer->name }}</td>
                            <td class="text-left">{{ $customer->phone }}</td>
                            <td class="text-left">{{ $customer->address }}</td>
                            <td class="text-left">{{ $customer->email }}</td>
                        <td class="text-center"><a edit_id="{{$customer->id}}" class="edit_ajax" id="modal"  data-toggle="modal" data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href=""  style="margin-left: 8px" delete_id="{{$customer->id}}" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
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
 

  <!--   Modal  Edit-->
  
  <div class="modal fade" id="myModal_Edit" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Edit Customer</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="{{url('admin/edit')}}" method="post" id="editCustomer" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input type="hidden" name="id_edit"  id="id_edit" value="">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Customer name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style=" width: 430px;" id="name" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style=" width: 430px;" id="phone" name="phone">
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style=" width: 430px;" id="address" name="address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  style=" width: 430px;" id="email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Facebook</label>
                  <div class="col-sm-10">
                    <input type="url" class="form-control" style=" width: 430px;" id="facebook" name="facebook">
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



  <!--   Modal  Add-->
  <div class="modal fade" id="myModal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog "> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Add Customer</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="{{url('admin/add')}}" method="post" id="addCustomer" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Customer name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style=" width: 430px;" id="name" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style=" width: 430px;" id="phone" name="phone">
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style=" width: 430px;" id="address" name="address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  style=" width: 430px;" id="email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Facebook</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style=" width: 430px;" id="facebook" name="facebook">
                  </div>
                </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right submit" id="save">Save</button>
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

  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script>


    $(function () {
      $('#result_table').DataTable({ //pagination by datatable
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'info'        : true,
        'autoWidth'   : false,
        "ordering": true,
        "aaSorting": [],
        "columnDefs":[{
            "targets": 4,
            "orderable": false
            },{ "targets": 3,"orderable": false}]
      });
    });

// validate


  $('#addCustomer').validate({
    ignore: [],
    debug: false,
    rules:{
      name:{
        required:true
      },     
      phone:{
        required:true       
      },
      address:{
        required:true
      },
      email:{
        required:true,
        email:true
      },   
    },
     messages:{
       name:{
         required:'Customer name is required'
       },
       phone:{
        required:'Customer phone is required',
        numeric: 'Customer phoner is number'
      },
      address:{
        required:'Customer address is required'
      },
      email:{
        required:'Customer email is required',
        email:'Customer email format email '
      }, 
      },
      
   });

  // ----------------
  // ADD
 $('#addCustomer').ajaxForm({ // add by ajax
     success: function(response) {
        $('#addCustomer')[0].reset();
        $('#myModal').modal('hide');
        $('#result').html(response);
    }
  });


  $('#editCustomer').ajaxForm({ // edit by ajax
     success: function(response) {
        $('#editCustomer')[0].reset();
        $('#myModal_Edit').modal('hide');
        $('#result').html(response);
    }
  });


   $(document).ready(function(){
     $(".simpleConfirm").click(function(event){// delete by ajax
       event.preventDefault();
        $id = $(this).attr('delete_id');
        $(this).confirm({
         title:'Delete Service confirmation.',
         text:'Are you sure want to delete ?',
         confirm: function() {
            $.ajax({
            type: "get",
            url: 'delete',
            data: {'id':$id},
            success:function(data){
             $('#result').html(data);
            }
          });         
          }
          });
          });


$('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
          event.preventDefault();
          $id = $(this).attr('edit_id');     
            $.ajax({
             type: "get",
              url: 'edit',
              data: {'id': $id},
            success: function(data){
              $('#name').attr('value', data[0]);
               $('#phone').attr('value', data[1]);
              $('#address').attr('value', data[2]);
              $('#email').attr('value', data[3]);
              $('#facebook').attr('value', data[4]);
               $('#id_edit').attr('value', data[5]);
            }
          });
        });
    });

  
    



 
</script>

@stop