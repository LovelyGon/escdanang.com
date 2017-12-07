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
  				<div style="margin: 10px" ><button  id="modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Add Service</button></div>
  				<div style="margin: 10px"><table class="table table-bordered">
                   <thead>
		                <tr>
		                    <th class="th_center">Services name</th>
                        <th class="th_center">Services type</th>
		                    <th class="th_center">Short Description</th>
		                    <th class="th_center">Description</th>
		                    <th class="th_center">Action</th>
		                </tr>
                   </thead>
                   <tbody>
                    @if(isset($services))
                      @foreach($services as $sv)
                     	<tr>
                     		<td class="td_center">{{$sv->service_name}}</td>
                     		<td class="td_center">{{$sv->type_of_service}}</td>
                     		<td class="td_center">{{$sv->short_description}}</td>
                        <td class="td_center">{!!$sv->description!!}</td>
                     		<td class="td_center"><a edit_id="{{$sv->id}}" class="modalff" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                     	  <a href="{{url('admin/deleteSV')}}/{{$sv->id}}" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                     	</tr>
                      @endforeach
                    @endif  
                   </tbody>
               </table></div>
                 {{$services->links()}} 
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
          <h4 class="modal-title"><strong>Add Service</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="{{url('addSV')}}" method="post" id="addSV" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namSV" name="nameSV">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service type</label>
                  <div class="col-sm-10">
                    <select name="typeSV" class="form-control">
                      <option value="0">--Choose Service--</option>
                      <option value="Legal Service"> Legal Service</option>
                      <option value="Enjoy your life Service"> Enjoy your life Service</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left">Service price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="priceSV">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Short Description</label>
                  <div class="col-sm-10">
                    <textarea name="desc_Short" id="" cols="20" rows="5" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Description</label>
                  <div class="col-sm-10 " id="desc_error">
                    <textarea name="description" id="add_desc" cols="10" rows="5" class="form-control"></textarea>
                    <script>CKEDITOR.replace('add_desc');</script>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left"></label>
                  <div class="col-sm-10" id="demo" >
                  <input type="file" class="input09" name="imageSV">
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
                    <select name="typeSV" class="form-control">
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
                   <textarea name="desc_Short" id="desc_Short" cols="20" rows="5" class="form-control" ></textarea>
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
    $('.input09').filestyle({
        text : 'Choose file',
        btnClass : 'btn-primary'
    });
  </script>
<!--   validation form -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
  <script> 
   $.validator.addMethod("ckrequired", function (value, element) { // validate ckeditor
            var idname = $(element).attr('id');  
            var editor = CKEDITOR.instances[idname];  
            var ckValue = GetTextFromHtml(editor.getData()).replace(/<[^>]*>/gi, '').trim();  
            if (ckValue.length === 0) {  
   //if empty or trimmed value then remove extra spacing to current control  
                $(element).val(ckValue);  
            } else {  
   //If not empty then leave the value as it is  
                $(element).val(editor.getData());  
            } 
            return $(element).val().length > 0;  
        },"Description service is required");  
  
   function GetTextFromHtml(html){  
            var dv = document.createElement("DIV");  
            dv.innerHTML = html;  
            return dv.textContent || dv.innerText || "";  
        }

   // validate form add
    $('#addSV').validate({
    ignore: [],
    debug: false,
    rules:{
      nameSV:{
        required:true
      },
      priceSV:{
        required:true
      },
      desc_Short:{
        required:true
      },
      description:{
        ckrequired:true
      }, 
      imageSV:{
        required:true
      }   
    },
     messages:{
       nameSV:{
         required:'Service name is required'
       },
       priceSV:{
         required:'Service price is required'
       },
       desc_Short:{
         required:'Short description is required'
       },
       imageSV:{
        required :'Image service is required and less than 2MB.',
       } 
      },
      highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
      unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
   });
    // validate form edit
      $('#editSV').validate({
      ignore: [],
      debug: false,
    rules:{
      nameSV:{
        required:true
      },
      priceSV:{
        required:true
      },
      desc_Short:{
        required:true
      },
      description:{
        ckrequired:true
       }  
    },
     messages:{
       nameSV:{
         required:'Service name is required'
       },
       priceSV:{
         required:'Service price is required'
       },
       desc_Short:{
         required:'Short description is required'
       }
      },
      highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
      unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }

   });

   $('.modalff').click(function(){  // do du lieu vao form edit
      $id = $(this).attr('edit_id');
      $.ajax({
        type: "get",
        url: 'editSV',
        data: {'id':$id},
        success:function(data){
          $('#namesv').attr('value',data[0]);
          $('#priceSV').attr('value',data[1]);
          $('#desc_Short').val(data[2]); 
          CKEDITOR.instances['edit_desc'].setData(data[3]);
          $('#id_edit').attr('value',data[4]);
        }
      });
   });
</script>
@stop
