<script src="{{asset('js/jquery.form.min.js')}}"></script>
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
    "ordering": false,
    "aaSorting": []
  });
});
//-------------------------------------------------------------------------------------------
    $('#addRE').validate({ // validate form add
    ignore: [],
    debug: false,
    rules:{
      partner_id:{        
        number:true  
      },
      titleRE:{        
        required:true  
      },
      submit_date:{
        required:true
      },
       expiryday:{
        required:true
      },
      short_desc:{
        required:true
      },
      positionRE:{
        required:true              
      }
    },
     messages:{
      partner_id:{
         number:'Please choose Partner Name.'
       },
       titleRE:{
         required:'Title is required and cannot be empty.'
       },
       submit_date:{
         required:'Start day  is required and cannot be empty.'
       },
       expiryday:{
         required:'Expiry day  is required and cannot be empty.'
       },
       short_desc:{
         required:'Short description is required and cannot be empty.'
       },
       positionRE:{
         required:'Position is required and cannot be empty.'
       } 
      }
   });
//--------------------------------------------------------------------------------------
$(document).ready(function(){ // reset modal when hidden
    $("#modal").click(function(){
      $("#myModal").on('hidden.bs.modal', function () {
          $('#addRE').resetForm();
          CKEDITOR.instances['content'].setData('');
          $('label.error').css('display','none');

      });
    }); 
    $(".edit_ajax").click(function(){
      $("#myModal_Edit").on('hidden.bs.modal', function () {
          $('#editRE').resetForm();
          $('label.error').css('display','none');
      });
    }); 
});
//----------------------------------------------------------------------------------------
$('#editRE').validate({ // validate form add
    ignore: [],
    debug: false,
    rules:{
      titleRE:{        
        required:true  
      },
      submit_date:{
        required:true
      },
       expiryday:{
        required:true
      },
      short_desc:{
        required:true
      },
      positionRE:{
        required:true
      }
    },
     messages:{
       titleRE:{
         required:'Title is required and cannot be empty.'
       },
       submit_date:{
         required:'Start day  is required and cannot be empty.'
       },
       expiryday:{
         required:'Expiry day  is required and cannot be empty.'
       },
       short_desc:{
         required:'Short description is required and cannot be empty.'
       },
       positionRE:{
         required:'Position is required and cannot be empty.'
       } 
      }
});
//-----------------------------------------------------------------------------------------
 $(document).ready(function(){
  $('#addRE').ajaxForm({ // add by ajax
  success: function(data) {
    $('#addRE')[0].reset();
    $('#myModal').modal('hide');
    CKEDITOR.instances['content'].setData('');
    $('#result').html(data);
    }
 });
});
//-------------------------------------------------------------------------------------
  $('#editRE').ajaxForm({ // edit by ajax
       success: function(data) {
          $('#editRE')[0].reset();
          $('#myModal_Edit').modal('hide');
          $('#result').html(data);
      }
  });
//--------------------------------------------------------------------------------------
$('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
      event.preventDefault();
      $id = $(this).attr('edit_id');
      $a = $('#PTname option:selected').val();
      $('#edit_status').attr('value',$a);
      $.ajax({
        type: "get",
        url: '{{URL::to('editRE')}}',
        data: {'id':$id},
        success:function(data){
          $('#id_edit').attr('value',data[0]);
          $('#title').attr('value',data[1]);
          $('#submit_date').attr('value',data[2]); 
          $('#description').text(data[3]); 
          $('#position').attr('value',data[4]);
          $('#expiry_day').attr('value',data[5]); 
          CKEDITOR.instances['content_edit'].setData(data[6]);  
        }
      });
});
//----------------------------------------------------------------------------------------
$("#result_table").on('click','.simpleConfirm',function(event){// delete by ajax
       event.preventDefault();
        $id = $(this).attr('delete_id');
        $a = $('#PTname option:selected').val();
        $(this).confirm({
         title:'Confirmation.',
         text:'Are you sure want to delete ?',
         confirm: function() {
            $.ajax({
            type: "get",
            url: '{{URL::to('deleteRE')}}',
            data: {'id':$id,'a':$a},
            success:function(data){
              $('#result').html(data); 
            }
          });
          }
        });
}); 
//--------------------------------------------------------------------------------------------
$('#PTname').on('change', function(event){// Partner search bay ajax
	  event.preventDefault();
      $PTname = $(this).val();
      $.ajax({
          type:'get',
          url: '{{URL::to('REsearch')}}',
          data:{'PTname':$PTname},
          success:function(data){
            $('#result').html(data);
          }
      });
});
//-----------------------------------------------------------------------------------
$('#modal').click(function(){
  $b = $('#PTname option:selected').text();
  $a = $('#PTname option:selected').val();
  $('#add_status').attr('value',$a);
  $('#select_id option').filter(function(){
  	 return ($(this).text() == $b);
  }).prop('selected', true);
});
//-----------------------------------------------------------------------------------
$(document).ready(function(){
   $text = $('#nextpage').val();
   $('#PTname option').each(function(){
    if($(this).text() == $text){
      $(this).attr('selected',true);
       $typePT = $(this).val();
       $.ajax({
        type:'get',
        url: '{{URL::to('searchRE')}}',
        data:{'typePT':$typePT},
        success:function(data){
          $('#result').html(data);
        }
     });
    }
   });
});
//---------------------------------------------------------------------------------------
$(document).ready(function(){ //get content ckeditor for request
  $('#add_get_ckeditor').click(function(){
    $content_add = CKEDITOR.instances['content'].getData();
    $('#content_hi_add').attr('value',$content_add );
  });
  $('#edit_get_ckeditor').click(function(){
    $content_edit = CKEDITOR.instances['content_edit'].getData();
    $('#content_hi_edit').attr('value',$content_edit );
  });
});
//-----------------------------------------------------------------------------------
$(document).ready(function(){ // boostrap js
   $('.tooltip02').hover(function(){
       $html = $(this).attr('fulltext');
       $(this).tooltip({title: $html , html: true, placement: "bottom"});
   });
});
</script>
