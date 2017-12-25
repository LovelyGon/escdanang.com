<table class="table table-bordered" id="result_table">
   <thead>
    <tr>
        <th scope="col" class="th_center">STT</th>
        <th scope="col" class="th_center">Name</th>
        <th scope="col" class="th_center">Action</th>
    </tr>
   </thead>
   <tbody id="body">
    @if(isset( $partner_types))
    @foreach( $partner_types as  $partner_type)
      <tr>
         <td scope="col">{{$partner_type->id}}</td>
         <td scope="col">{{$partner_type->name}}</td>
         <td style="text-align: center"><a edit_id="{{$partner_type->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
        <a delete_id="{{$partner_type->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
    @endforeach
    @endif 
   </tbody>
</table>
@include('admin.PartnerType.viewPTtypejs')