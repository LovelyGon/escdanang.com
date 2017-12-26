<table class="table table-striped table-bordered table-hover" id="result_table">
                   <thead>
                    <tr >
                        <th class="th_center">Title</th>
                        <th class="th_center">Type</th>
                        <th class="th_center">Short description</th>
                        <th class="th_center">Content</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody>
                   
                      @foreach($news as $new_er)
                      <tr >
                        <td class="text-left">{{ $new_er->title }}</td>
                            <td class="text-left">{{ $new_er->type }}</td>
                            <td class="text-left">{{ $new_er->short_description }}</td>
                           <td class="text-left">{{substr($new_er->content,0,10)}}<span class="tooltip02" fulltext="{{$new_er->content}}">...</span></td>
                            
                        <td class="text-center"><a edit_id="{{$new_er->id}}" class="edit_ajax" id="modal"  data-toggle="modal" data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href=""  style="margin-left: 8px" delete_id="{{$new_er->id}}" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                      @endforeach
                  
                   </tbody>
               </table>
 

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
            "targets": 4,
            "orderable": false
            },{ "targets": 3,"orderable": false}]
      });
    });
// --------------------------------------------------------------------------------

  $('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
          event.preventDefault();
          $id = $(this).attr('edit_id');     
            $.ajax({
             type: "get",
              url: 'edit',
              data: {'id': $id},
            success: function(data){
               $('#title1').attr('value', data['title']);
               $('#op_id1').text(data['type']);
              $('#short_description1').val(data['short_description']); 
               CKEDITOR.instances['edit_desc'].setData(data['content']);
               $('#id_edit').attr('value', data['id']);
              $('#start_date1').attr('value',data['start_date']);
              $('#end_date1').attr( 'value',data['end_date']);
            }
          });
        });

// ------------------------------------------------------------------------------------
  
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
            url: 'deleteNews',
            data: {'id':$id},
            success:function(data){
             $('#result').html(data);
            }
          });         
          }
          });
          });
          });   

 $(document).ready(function(){ // tootip boostrap js
   $('.tooltip02').hover(function(){
       $html = $(this).attr('fulltext');
       $(this).tooltip({title: $html , html: true, placement: "bottom"});
   });
});              
        
  </script>      