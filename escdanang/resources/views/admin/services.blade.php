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
                        <th class="th_center">Services name</th>
                        <th class="th_center">Services price</th>
                        <th class="th_center">Services type</th>
                        <th class="th_center">Short Description</th>
                        <th class="th_center">Description</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody id="body">
                    @if(isset($services))
                      @foreach($services as $sv)
                      <tr>
                        <td class="td_center">{{$sv->service_name}}</td>
                        <td class="td_center">{{$sv->price}}</td>
                        <td class="td_center">{{$sv->type_of_service}}</td>
                        <td class="td_center">{{substr($sv->short_description,0,20)}}<a title="{{$sv->short_description}}">...</a></td>
                        <td class="td_center">{{substr($sv->description,0,50)}}<a title="{{$sv->description}}">...</a></td>
                        <td class="td_center"><a edit_id="{{$sv->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a delete_id="{{$sv->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                      @endforeach
                    @endif  
                   </tbody>
               </table>
               <script>
                 
               </script>
          </div>
          <a href=""><button class="btn btn-primary pull-right" style="margin-bottom: 20px;
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
                    <input type="text" class="form-control" id="nameSV" name="nameSV">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service type</label>
                  <div class="col-sm-10">
                    <select name="typeSV" class="form-control" id="typeSV">
                      <option value="0">--Choose Service--</option>
                      <option value="Legal Service"> Legal Service</option>
                      <option value="Enjoy your life Service"> Enjoy your life Service</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="priceSV" name="priceSV">
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
                  <label class="col-sm-2 control-label" style="text-align: left"></label>
                  <div class="col-sm-10" id="demo" >
                  <input type="file" class="input09" name="imageSV" id="imageSV"> 
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
                    <input type="text" class="form-control" id="namesv" name="nameSV">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service type</label>
                  <div class="col-sm-10">
                    <select name="typeSV" class="form-control" id="select_id">
                      <option value="0" id="op_id"></option>
                      <option value="Legal Service"> Legal Service</option>
                      <option value="Enjoy your life Service"> Enjoy your life Service</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pricesv" name="priceSV">
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
                  <label class="col-sm-2 control-label" style="text-align: left"></label>
                  <div class="col-sm-10">
                  <input type="file" class="input09" name="imageSV">
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
  <script type="text/javascript" src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>
  <script>
    $('.input09').filestyle({//format input type file
        text : 'Choose file',
        btnClass : 'btn-primary'
    });
  </script>
<!--   validation form  script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
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
            "targets": 5,
            "orderable": false
            },{ "targets": 4,"orderable": false},{"targets": 3,"orderable": false}]
      });
    });
//-------------------------------------------------------------------------------------------
    $('#addSV').validate({ // validate form add
    ignore: [],
    debug: false,
    rules:{
      nameSV:{
        required:true
      }
    },
     messages:{
       nameSV:{
         required:'Service name is required and cannot be empty.'
       } 
      }
   });
//---------------------------------------------------------------------------------------
      $('#editSV').validate({// validate form edit
      ignore: [],
      debug: false,
      rules:{
        nameSV:{
          required:true
        }
      },
      messages:{
       nameSV:{
         required:'Service name is required and cannot be empty.'
       }
      }
   });
//-----------------------------------------------------------------------------------
  $('#addSV').ajaxForm({ // add by ajax
     success: function(response) {
        $('#addSV')[0].reset();
        $('#myModal').modal('hide');
        $('#result').html(response);
    }
  });
//----------------------------------------------------------------------------------
  $('#editSV').ajaxForm({ // edit by ajax
     success: function(response) {
        $('#editSV')[0].reset();
        $('#myModal_Edit').modal('hide');
        $('#result').html(response);
    }
  });
//-------------------------------------------------------------------------------
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
            url: 'deleteSV',
            data: {'id':$id},
            success:function(data){
             $('#result').html(data);
            }
          });         
          }
          });
          });
    //----------------------------------------------------------------------------
     $('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
          event.preventDefault();
          $id = $(this).attr('edit_id');
          $.ajax({
            type: "get",
            url: 'editSV',
            data: {'id':$id},
            success:function(data){
              $('#namesv').attr('value',data[0]);
              $('#pricesv').attr('value',data[1]);
              $('#edesc_Short').val(data[2]); 
              CKEDITOR.instances['edit_desc'].setData(data[3]);
              $('#id_edit').attr('value',data[4]);
              $('#op_id').text(data[5]);
            }
          });
        });
    });
//---------------------------------------------------------------------------------             
 // $(document).on('click','.pagination a',function(event){ //pagination on server by ajax
 //  event.preventDefault();
 //  var page = $(this).attr('href').split('page=')[1];
  
 //   $.ajax({
 //    url: 'paginate?page='+page,
 //    success:function(data){
 //        $('#result').html(data);
 //     }
 //   });
 // });
</script>
@stop
