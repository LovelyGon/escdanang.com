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
                   <tbody  id="news-list" name="news-list">
                   
                      @foreach($news as $new)
                      <tr id="news{{$new->id}}">
                        <td class="text-left">{{ $new->title }}</td>
                            <td class="text-left">{{ $new->type }}</td>
                            <td class="text-left">{{ $new->short_description }}</td>
                            <td class="text-left">{{substr($new->content,0,50)}}</td>
                            
                        <td class="text-center"><a edit_id="{{$new->id}}" class="edit_ajax" id="modal"  data-toggle="modal" data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href=""  style="margin-left: 8px" delete_id="{{$new->id}}" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
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


  $('.edit_ajax').click(function(event){ // ajax do du lieu vao form edit
          event.preventDefault();
          $id = $(this).attr('edit_id');     
            $.ajax({
             type: "get",
              url: 'editNews',
              data: {'id': $id},
            success: function(data){
              $('#title').attr('value', data[0]);
              $('#op_id').text(data[1]);
             $('#start').attr('value', data[2]);
              $('#end').attr('value', data[3]);
              $('#short_description').val(data[4]); 
               CKEDITOR.instances['edit_desc'].setData(data[5]);
               $('#id_edit').attr('value', data[6]);
            }
          });
        });  

  
    $(document).ready(function(){
     $(".simpleConfirm").click(function(event){// delete by ajax
       event.preventDefault();
        $id = $(this).attr('delete_id');
        $(this).confirm({
         title:'Delete News confirmation.',
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
        
  </script>      