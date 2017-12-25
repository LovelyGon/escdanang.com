<table class="table table-striped table-bordered table-hover" id="result_table">
                   <thead>
                    <tr >
                        <th class="th_center">Name</th>
                        <th class="th_center">Email</th>
                        <th class="th_center">Phone</th>
                        <th class="th_center">Website</th>
                          <th class="th_center">Comment</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody  >
                   
                      @foreach($contacts as $contact)
                      <tr >
                        <td class="text-left">{{ $contact->name }}</td>
                            <td class="text-left">{{ $contact->email }}</td>
                            <td class="text-left">{{ $contact->phone }}</td>
                           <td class="text-left">{{ $contact->website }}</td> 
                            <td class="text-left">{{ $contact->comment }}</td>
                        <td class="text-center">
                        <a href=""  delete_id="{{$contact->id}}" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
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
            "targets": 5,
            "orderable": false
            },{ "targets": 4,"orderable": false},{"targets": 3,"orderable": false}]
      });
    });

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
            url: 'deleteContacts',
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