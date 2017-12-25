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
//---------------------------------------------------------------------------------------------
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
//----------------------------------------------------------------------------------------------
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
//-----------------------------------------------------------------------------------
$(document).ready(function(){ // boostrap js
   $('.tooltip02').hover(function(){
       $html = $(this).attr('fulltext');
       $(this).tooltip({title: $html , html: true, placement: "bottom"});
   });
});
</script>