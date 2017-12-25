<table class="table table-bordered" id="result_table">
                   <thead>
                    <tr>
                        <th class="th_center">Customer name</th>
                        <th class="th_center">Customer phone</th>
                        <th class="th_center"> Address</th>
                        <th class="th_center">Email</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody id="body">
                    @if(isset($customers))
                      @foreach($customers as $customer)
                      <tr>
                        <td class="td_center">{{$customer->name}}</td>
                        <td class="td_center">{{$customer->phone}}</td>
                        <td class="td_center">{{$customer->address}}</td>
                         <td class="td_center">{{$customer->email}}</td>
                       
                        <td class="td_center"><a edit_id="{{$customer->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a delete_id="{{$customer->id}}" style="margin-left: 8px" class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                      @endforeach
                    @endif  
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
//-----------------------------------------------------------------------------------------
                  $(".simpleConfirm").click(function(event){// delete by ajax
                    event.preventDefault();
                    $id = $(this).attr('delete_id');
                    $(this).confirm({
                     title:'Confirmation.',
                     text:'Are you sure want to delete ?',
                     confirm: function() {
                        $.ajax({
                        type: "get",
                        url: 'delete',
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
              url: 'edit',
              data: {'id': $id},
            success: function(data){
              $('#name1').attr('value', data[0]);
               $('#phone1').attr('value', data[1]);
              $('#address1').attr('value', data[2]);
              $('#email1').attr('value', data[3]);
              $('#facebook1').attr('value', data[4]);
               $('#id_edit').attr('value', data[5]);
            }
          });
        });
    
           
//--------------------------------------------------------------------------------------------
             </script>
