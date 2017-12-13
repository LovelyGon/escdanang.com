<table class="table table-bordered" id="result_table">
                   <thead>
                    <tr>
                        <th class="th_center">Services name</th>
                        <th class="th_center">Services price</th>
                        <th class="th_center">Services type</th>
                        <th class="th_center">Short Description</th>
                        <th class="th_center">Description</th>
                        <th class="th_center">Action</th>
                    </tr>
                   </thead>
                   <tbody id="body">
                    @if(isset($services))
                      @foreach($services as $sv)
                      <tr>
                        <td class="td_center">{{$sv->service_name}}</td>
                        <td class="td_center">{{$sv->price}}</td>
                        <td class="td_center">{{$sv->type_of_service}}</td>
                        <td class="td_center">{{substr($sv->short_description,0,20)}}<a title="{{$sv->short_description}}">...</a></td>
                        <td class="td_center">{{substr($sv->description,0,50)}}<a title="{{$sv->description}}">...</a></td>
                        <td class="td_center"><a edit_id="{{$sv->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a delete_id="{{$sv->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
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
                    "aaSorting": []
                  });
//-----------------------------------------------------------------------------------------
                  $(".simpleConfirm").click(function(event){// delete by ajax
                    event.preventDefault();
                    $id = $(this).attr('delete_id');
                    $(this).confirm({
                     title:'Delete Service confirmation.',
                     text:'Are you sure want to delete ?',
                     confirm: function() {
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
                    url: 'editSV',
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
             </script>
