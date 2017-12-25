  <script type="text/javascript" src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>
  <script src="{{asset('js/jquery.form.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
  <script>
    $('.input09').filestyle({//format input type file
        text : 'Choose file',
        btnClass : 'btn-primary'
    });
  </script>
<!--   validation form  script-->
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
//-------------------------------------------------------------------------------------
$(document).ready(function(){ // reset modal when hidden
    $("#modal").click(function(){
      $("#myModal").on('hidden.bs.modal', function () {
          $('#addSV').resetForm();
          CKEDITOR.instances['add_desc'].setData('');
          $('label.error').css('display','none');

      });
    }); 
    $(".edit_ajax").click(function(){
      $("#myModal_Edit").on('hidden.bs.modal', function () {
          $('#editSV').resetForm();
          $('label.error').css('display','none');
      });
    }); 
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
     $("#result_table").on('click','.simpleConfirm',function(event){// delete by ajax
       event.preventDefault();
        $id = $(this).attr('delete_id');
        $(this).confirm({
         title:'Confirmation.',
         text:'Are you sure want to delete ?',
         confirm: function(){
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
   });
//----------------------------------------------------------------------------
$('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
    event.preventDefault();
    $id = $(this).attr('edit_id');
    $.ajax({
      type: "get",
      url: '{{URL::to('editSV')}}',
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
//-----------------------------------------------------------------------------------
$(document).ready(function(){ // tootip boostrap js
   $('.tooltip02').hover(function(){
       $html = $(this).attr('fulltext');
       $(this).tooltip({title: $html , html: true, placement: "bottom"});
   });
});
//---------------------------------------------------------------------------------------
$(document).ready(function(){ //get content ckeditor for request
  $('#add_get_ckeditor').click(function(){
    $content_add = CKEDITOR.instances['add_desc'].getData();
    $('#content_hi_add').attr('value',$content_add );
  });
  $('#edit_get_ckeditor').click(function(){
    $content_edit = CKEDITOR.instances['edit_desc'].getData();
    $('#content_hi_edit').attr('value',$content_edit );
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