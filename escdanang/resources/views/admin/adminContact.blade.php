@extends('admin.admin_master')
@section('content_header')
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard" >Home</i> </a></li>
        <li><a href="">Contact</a></li>
      </ol>
</section>
@stop
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box" style="padding-bottom:10px ">
        <div class="box-body">
        <fieldset style="border: 1px solid #ecf0f5 ;margin: 10px">
          <legend style =" margin-left: 15px;border: none; width: auto" style =" margin-left: 15px;border: none; width: auto;"><strong style="font-size:30px ">Contacts</strong></legend>
          <div style="margin: 15px" id="result">

          <table class="table table-striped table-bordered table-hover" id="result_table">
                   <thead>
                    <tr >
                        <th class="th_center">Name</th>
                        <th class="th_center">Email</th>
                        <th class="th_center">Phone</th>
                        <th class="th_center">Website</th>
                          <th class="th_center">Comment</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody  >
                   
                      @foreach($contacts as $contact)
                      <tr >
                        <td class="text-left">{{ $contact->name }}</td>
                            <td class="text-left">{{ $contact->email }}</td>
                            <td class="text-left">{{ $contact->phone }}</td>
                           <td class="text-left">{{ $contact->website }}</td> 
                            <td class="text-left">{{ $contact->comment }}</td>
                        <td class="text-center">
                        <a href=""  delete_id="{{$contact->id}}" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
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
</div>
@stop
@section('script')
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
            url: 'deleteContacts',
            data: {'id':$id},
            success:function(data){
             $('#result').html(data);
            }
          });         
          }
          });
          });
});
</script>
   
   
@stop