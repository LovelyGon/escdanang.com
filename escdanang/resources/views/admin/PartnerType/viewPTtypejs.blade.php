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
//---------------------------------------------------------------------
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
//---------------------------------------------------------------------
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
</script>