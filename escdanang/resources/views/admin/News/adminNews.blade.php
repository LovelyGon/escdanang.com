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
          <div style="margin: 15px" ><button  id="modal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Add news</button></div>
          <div style="margin: 15px" id="result">

          <table class="table table-striped table-bordered " id="result_table">
                   <thead>
                    <tr >
                        <th class="th_center">Title</th>
                        <th class="th_center">Type</th>
                        <th class="th_center">Short description</th>
                        <th class="th_center">Content</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody>
                   
                      @foreach($news as $new_er)
                      <tr>
                        <td class="text-left">{{ $new_er->title }}</td>
                            <td class="text-left">{{ $new_er->type }}</td>
                            <td class="text-left">{{ $new_er->short_description }}</td>
                            <td class="text-left">{{substr($new_er->content,0,10)}}<span class="tooltip02" fulltext="{{$new_er->content}}">...</span></td>
                            
                        <td class="text-center"><a edit_id="{{$new_er->id}}" class="edit_ajax" id="modal"  data-toggle="modal" data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href=""  style="margin-left: 8px" delete_id="{{$new_er->id}}" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
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
          <form class="form-horizontal" action="{{url('admin/addNews')}}" method="post" id="addNews" enctype="multipart/form-data">
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
                    <input type="date" class="form-control" style=" width: 686px;" id="start_date" name="start">
                  </div>
                </div>
                <div class="form-group"  id="hide1">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">End date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" style=" width: 686px;" id="end_date" name="end_date">
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
                <button type="submit" class="btn btn-primary pull-right submit" id="save">Save</button>
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
          <h4 class="modal-title"><strong>Edit News</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="{{url('admin/editNews')}}" method="post" id="editNews" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input type="hidden" name="id_edit"  id="id_edit">
              <div class="box-body">
                 <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Type</label>
                  <div class="col-sm-10">
                     <select name="type" class="form-control" id="type1">
                      <option value="0" id="op_id1">--Choose News--</option>
                      <option value="news"> News</option>
                      <option value="promotion">Promotion</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  style=" width: 686px;" id="title1" name="title">
                  </div>
                </div>
                <div class="form-group" id="hide">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">Start date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" style=" width: 686px;" id="start_date1" name="start_date">
                  </div>
                </div>
                <div class="form-group"  id="hide1">
                  <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left">End date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control"  style=" width: 686px;" id="end_date1" name="end_date">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">short description</label>
                  <div class="col-sm-10">
                    <textarea name="short_description" id="short_description1" cols="20" rows="5" class="form-control" style="width: -webkit-fill-available;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left">Content</label>
                  <div class="col-sm-10 " id="desc_error">
                    <textarea name="content" id="edit_desc" cols="10" rows="5" class="form-control" ></textarea>
                    <script>CKEDITOR.replace('edit_desc');</script>
                  </div>
                </div>
               
                 <div class="form-group">
                  <label class="col-sm-2 control-label" style="text-align: left"></label>
                  <div class="col-sm-10" id="demo1" >
                  <input type="file" class="input09" name="image" id="image1"> 
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

</div>


@stop
@section('script')
<script type="text/javascript" src="{{asset('js/jquery.form.min.js')}}"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
 <script type="text/javascript" src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>
  <script>
    $('.input09').filestyle({//format input type file
        text : 'Choose file',
        btnClass : 'btn-primary'
    });

    //--------------------------------------------------------------
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

     //-------------------------------------------------------------------
 
    $(function () {
        $("#type").change(function () {
            if ($(this).val() == "news") {
                $("#hide").hide();
                 $("#hide1").hide();
            } else {
                $("#hide").show();
                $("#hide1").show();
            }
        });
    });
 



     //---------------------------------------------------------------
     
     $('#addNews').validate({ // validate form add
        ignore: [],
        debug: false,
        rules:{
          title:{
            required:true
          }
        },
         messages:{
           title:{
             required:'News name is required and cannot be empty.'
           } 
          },
       });

     //----------------------------------------------------------------------
    // add new ajax
    
    $('#addNews').ajaxForm({ // add by ajax
     success: function(response) {
        $('#addNews')[0].reset();
        $('#myModal').modal('hide');
        $('#result').html(response);
   //console.log(response);
   }
  });


     //---------------------------------------------------------------------
    $('#editNews').ajaxForm({ // edit by ajax
       success: function(response) {
          $('#editNews')[0].reset();
          $('#myModal_Edit').modal('hide');
          $('#result').html(response);
          //console.log(response);
      }
    });

   // ----------------------------------------------------------------------
     
  $('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
          event.preventDefault();
          $id = $(this).attr('edit_id');     
            $.ajax({
             type: "get",
              url: 'edit',
              data: {'id': $id},
            success: function(data){
               $('#title1').attr('value', data['title']);
               $('#op_id1').text(data['type']);
              $('#short_description1').val(data['short_description']); 
               CKEDITOR.instances['edit_desc'].setData(data['content']);
               $('#id_edit').attr('value', data['id']);
              $('#start_date1').attr('value',data['start_date']);
              $('#end_date1').attr( 'value',data['end_date']);
            }
          });
        });

//------------------------------------------------------------------------------------
    $(document).ready(function(){
     $(".simpleConfirm").click(function(event){// delete by ajax
       event.preventDefault();
        $id = $(this).attr('delete_id');
        $(this).confirm({
         title:'Confirmation.',
         text:'Are you sure want to delete ?',
         confirm: function() {
            $.ajax({
            type: "get",
            url: 'deleteNews',
            data: {'id':$id},
            success:function(data){
             $('#result').html(data);
            }
          });         
          }
          });
          });
});

 // -----------------------------------------------------------  
   
 $(document).ready(function(){ // tootip boostrap js
   $('.tooltip02').hover(function(){
       $html = $(this).attr('fulltext');
       $(this).tooltip({title: $html , html: true, placement: "bottom"});
   });
});

  </script>
@stop