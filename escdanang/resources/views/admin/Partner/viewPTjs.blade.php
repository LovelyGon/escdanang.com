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
              "targets": 6,
              "orderable": false
              },{ "targets": 5,"orderable": false},{"targets": 4,"orderable": false},{"targets": 3,"orderable": false},{"targets": 2,"orderable": false},{"targets": 1,"orderable": false},{"targets": 0,"orderable": false},]
        });
    });
  //-----------------------------------------------------------------------------------------
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
//-----------------------------------------------------------------------------------------------
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