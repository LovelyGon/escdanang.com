  <script src="{{asset('js/jquery.form.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
  <script>
$('.input09').filestyle({//format input type file
    text : 'Choose file',
    btnClass : 'btn-primary'
});
//-----------------------------------------------------------------------------------        
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
//--------------------------------------------------------------------------
$('#addPTtype').validate({ // validate form add
    ignore: [],
    debug: false,
    rules:{
      namePTtype:{
        required:true
      }
    },
     messages:{
       namePTtype:{
         required:'Name is required and cannot be empty.'
       }
      }
   });
//-------------------------------------------------------------------------
$('#editPTtype').validate({ // validate form add
  ignore: [],
  debug: false,
  rules:{
    namePTtype:{
      required:true
    }
  },
   messages:{
     namePTtype:{
       required:'Name is required and cannot be empty.'
     }
    }
 });
//----------------------------------------------------------------------------------
$('#addPTtype').ajaxForm({ // add by ajax
   success: function(data) {
      $('#addPTtype')[0].reset();
      $('#myModal').modal('hide');
      $('#result').html(data);
  }
});
//-----------------------------------------------------------------------------------
$('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
    event.preventDefault();
    $id = $(this).attr('edit_id');
    $.ajax({
      type: "get",
      url: '{{URL::to('editPTtype')}}',
      data: {'id':$id},
      success:function(data){
        $('#edit_id').attr('value',data[0]);
        $('#namePTtype_edit').attr('value',data[1]);
      }
    });
});
//-------------------------------------------------------------------------------------
$('#editPTtype').ajaxForm({ // edit by ajax
 success: function(data) {
    $('#editPTtype')[0].reset();
    $('#myModal_Edit').modal('hide');
    $('#result').html(data);
}
});
//-----------------------------------------------------------------------------------
$("#result_table").on('click','.simpleConfirm',function(event){// delete by ajax
 event.preventDefault();
  $id = $(this).attr('delete_id');
  $(this).confirm({
   title:'Confirmation.',
   text:'Are you sure want to delete ?',
   confirm: function() {
      $.ajax({
      type: "get",
      url: '{{URL::to('deletePTtype')}}',
      data: {'id':$id},
      success:function(data){
        $('#result').html(data); 
      }
    });
    }
  });
  }); 
//---------------------------------------------------------------------------------------
$(document).ready(function(){ // reset modal when hidden
    $("#modal").click(function(){
      $("#myModal").on('hidden.bs.modal', function () {
          $('#addPT').resetForm();
          $('label.error').css('display','none');
      });
    }); 
    $(".edit_ajax").click(function(){
      $("#myModal_Edit").on('hidden.bs.modal', function () {
          $('#editPT').resetForm();
          $('label.error').css('display','none');
      });
    }); 
});
  </script>