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
                            <td class="text-left">{{substr($new_er->content,0,50)}}</td>
                            
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
              url: 'editNews',
              data: {'id': $id},
            success: function(data){
              // console.log(data);
              $('#title').attr('value', data[0]);
              $('#op_id').text(data[1]);
              $('#short_description').val(data[2]); 
               CKEDITOR.instances['edit_desc'].setData(data[3]);
              $('#id_edit').attr('value', data[4]);
              $('#start_date').attr('value',data[5]);
              $('#end_date').attr( 'value',data[6]);
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
        
  </script>      