  <script type="text/javascript" src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.form.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
  <script>
$('.input09').filestyle({//format input type file
    text : 'Choose file',
    btnClass : 'btn-primary'
});
$('#logoPT').filestyle({//format input type file
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
      "ordering": true,
      "aaSorting": [],
      "columnDefs":[{
          "targets": 6,
          "orderable": false
          },{ "targets": 5,"orderable": false},{"targets": 4,"orderable": false},{"targets": 3,"orderable": false},{"targets": 2,"orderable": false},{"targets": 1,"orderable": false},{"targets": 0,"orderable": false},]
    });
});
//--------------------------------------------------------------------------
$('#addPT').validate({ // validate form add
    ignore: [],
    debug: false,
    rules:{
      typePT:{
        number:true
      },
      namePT:{
        required:true
      },
      addressPT:{
        required:true
      },                          
      emailPT:{
        required:true
      },
      phonePT:{
        required:true
      },
      webPT:{
        required:true
      }
    },
     messages:{
       typePT:{
         number:'Please Choose Partner Type.'
       },
       namePT:{
         required:'Partner name is required and cannot be empty.'
       },
       addressPT:{
         required:'Address is required and cannot be empty.'
       },
        emailPT:{
         required:'Email is required and cannot be empty.'
       },
        phonePT:{
         required:'Phone number is required and cannot be empty.'
       },
       webPT:{
         required:'Website is required and cannot be empty.'
       } 
      }
   });
//-------------------------------------------------------------------------
$('#editPT').validate({ // validate form add
  ignore: [],
  debug: false,
  rules:{
    namept:{
      required:true
    },
    addresspt:{
      required:true
    },
    emailpt:{
      required:true
    },
    phonept:{
      required:true
    },
    webpt:{
      required:true
    }
  },
   messages:{
     namept:{
       required:'Partner name is required and cannot be empty.'
     },
     addresspt:{
       required:'Address is required and cannot be empty.'
     },
      emailpt:{
       required:'Email is required and cannot be empty.'
     },
      phonept:{
       required:'Phone number is required and cannot be empty.'
     },
     webpt:{
       required:'Website is required and cannot be empty.'
     } 
    }
 });
//-------------------------------------------------------------------------------------
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
//----------------------------------------------------------------------------------
$('#addPT').ajaxForm({ // add by ajax
   success: function(data) {
      $('#addPT')[0].reset();
      $('#myModal').modal('hide');
      $('#result').html(data);
  }
});
//-----------------------------------------------------------------------------------
$('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
    event.preventDefault();
    $id = $(this).attr('edit_id');
    $ed_status = $('#PTtype option:selected').val();
    $('#edit_status').attr('value',$ed_status);
    $.ajax({
      type: "get",
      url: '{{URL::to('editPT')}}',
      data: {'id':$id},
      success:function(data){
        $('#id_edit_PT').attr('value',data[0]);
        $('#namept').attr('value',data[1]);
        $('#addresspt').attr('value',data[2]);
        $('#op_type').text(data[3]); 
        $('#emailpt').attr('value',data[4]); 
        $('#webpt').attr('value',data[5]);
        $('#phonept').attr('value',data[6]); 
      }
    });
});
//-------------------------------------------------------------------------------------
$('#editPT').ajaxForm({ // edit by ajax
 success: function(data) {
    $('#editPT')[0].reset();
    $('#myModal_Edit').modal('hide');
    $('#result').html(data);
    }
});
//------------------------------------------------------------------------------------        
$('#PTtype').on('change',function(){ // Partner search bay ajax
    $typePT = $(this).val();
    $.ajax({
        type:'get',
        url: '{{URL::to('PTsearch')}}',
        data:{'typePT':$typePT},
        success:function(data){
          $('#result').html(data);
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
$("#result_table").on('click','.simpleConfirm',function(event){// delete by ajax
     event.preventDefault();
      $id = $(this).attr('delete_id');
      $de_status = $('#PTtype option:selected').val();
      $(this).confirm({
       title:'Confirmation.',
       text:'Are you sure want to delete ?',
       confirm: function() {
          $.ajax({
          type: "get",
          url: '{{URL::to('deletePT')}}',
          data: {'id':$id,'de_status':$de_status},
          success:function(data){
            $('#result').html(data); 
          }
        });
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
  </script>