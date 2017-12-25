
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
      "ordering": false
    });
});
// //--------------------------------------------------------------------------
$('#addTOUR').validate({ // validate form add
        ignore: [],
        debug: false,
        rules:{
          partner:{
            number:true
          },
          nameTOUR:{
            required:true
          },
          start_date:{
            required:true
          },
          end_date:{                
            required:true
          }
        },
         messages:{
           partner:{
             number:'Please choose Partner Name.'
           },
           nameTOUR:{
             required:'Tour name is required and cannot be empty.'
           },
           start_date:{
             required:'Start day is required and cannot be empty.'
           },
           end_date:{
             required:'End day is required and cannot be empty.'
           }
          }
       });
//-------------------------------------------------------------------------
$('#editTOUR').validate({ // validate form add
      ignore: [],
      debug: false,
      rules:{
        nameTOUR:{
          required:true
        },
         start_date:{
          required:true
        },
        end_date:{
          required:true
        }
      },
       messages:{
         nameTOUR:{
           required:'Tour name is required and cannot be empty.'
         },
          start_date:{
           required:'Start day is required and cannot be empty.'
         },
         end_date:{
           required:'End day is required and cannot be empty.'
         }
        }
     });
//-------------------------------------------------------------------------------------
$(document).ready(function(){ // reset modal when hidden
    $("#modal").click(function(){
      $("#myModal").on('hidden.bs.modal', function () {
          $('#addTOUR').resetForm();
          CKEDITOR.instances['desc_TOUR'].setData('');
          $('label.error').css('display','none');

      });
    }); 
    $(".edit_ajax").click(function(){
      $("#myModal_Edit").on('hidden.bs.modal', function () {
          $('#editTOUR').resetForm();
          $('label.error').css('display','none');
      });
    }); 
});
//--------------------------------------------------------------------------------------
$('#PTtype').on('change',function(){ // Partner search bay ajax
  $typePT = $(this).val();
  $.ajax({
      type:'get',
      url: '{{URL::to('TOURsearch')}}',
      data:{'typePT':$typePT},
      success:function(data){
        $('#result').html(data);
      }
  });
});
//-----------------------------------------------------------------------------------
$('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
    event.preventDefault();
    $id = $(this).attr('edit_id');
    $a = $('#PTtype option:selected').val();
    $('#edit_status').attr('value',$a);
    $.ajax({
      type: "get",
      url: '{{URL::to('editTOUR')}}',
      data: {'id':$id},
      success:function(data){
        $('#id_edit').attr('value',data[0]);
        $('#nametour').attr('value',data[1]);
        $('#Start_date').attr('value',data[4]);
        $('#End_date').attr('value',data[5]);
        CKEDITOR.instances['desc_tour'].setData(data[3]); 
        $('#patner_id').attr('value',data[6]); 
      }
    });
});
//----------------------------------------------------------------------------------
$('#addTOUR').ajaxForm({ // add by ajax
   success: function(data) {
      $('#addTOUR')[0].reset();
      CKEDITOR.instances['desc_TOUR'].setData('');
      $('#myModal').modal('hide');
      $('#result').html(data);
  }
});
//-------------------------------------------------------------------------------------
 $('#editTOUR').ajaxForm({ // edit by ajax
   success: function(data) {
      $('#editTOUR')[0].reset();
      $('#myModal_Edit').modal('hide');        
      $('#result').html(data);
  }
});
//-----------------------------------------------------------------------------------
$("#result_table").on('click','.simpleConfirm',function(event){// delete by ajax
event.preventDefault();
$id = $(this).attr('delete_id');
$a = $('#PTtype option:selected').val();
$(this).confirm({
 title:'Confirmation.',
 text:'Are you sure want to delete ?',
 confirm: function() {
    $.ajax({
    type: "get",
    url: '{{URL::to('deleteTOUR')}}',
    data: {'id':$id,'a':$a},
    success:function(data){
      $('#result').html(data);
    }
  });
  }
});
});
//-----------------------------------------------------------------------------------
$('#modal').click(function(){ // default select option on form add
  $b = $('#PTtype option:selected').text();
  $a = $('#PTtype option:selected').val();
  $('#add_status').attr('value',$a);
  $('#select_id option').filter(function(){
     return ($(this).text() == $b);
  }).prop('selected', true);
});
//-----------------------------------------------------------------------------------
$(document).ready(function(){
   $text = $('#nextpage').val();
   $('#PTtype option').each(function(){
    if($(this).text() == $text){
      $(this).attr('selected',true);
       $typePT = $(this).val();
       $.ajax({
        type:'get',
        url: '{{URL::to('searchTOUR')}}',
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
    $content_add = CKEDITOR.instances['desc_TOUR'].getData();
    $('#content_hi_add').attr('value',$content_add );
  });
  $('#edit_get_ckeditor').click(function(){
    $content_edit = CKEDITOR.instances['desc_tour'].getData();
    $('#content_hi_edit').attr('value',$content_edit );
  });
});
//-----------------------------------------------------------------------------------
$(document).ready(function(){ // tootip boostrap js
   $('.tooltip02').hover(function(){
       $html = $(this).attr('fulltext');
       $(this).tooltip({title: $html , html: true, placement: "bottom"});
   });
});
</script>