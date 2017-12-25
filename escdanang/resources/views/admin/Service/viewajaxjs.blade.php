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
//-----------------------------------------------------------------------------------------
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
//-----------------------------------------------------------------------------------------
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
//--------------------------------------------------------------------------------------------
$(document).ready(function(){ // tootip boostrap js
   $('.tooltip02').hover(function(){
       $html = $(this).attr('fulltext');
       $(this).tooltip({title: $html , html: true, placement: "bottom"});
   });
});
</script>