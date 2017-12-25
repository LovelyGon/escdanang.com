<table class="table table-bordered" id="result_table">
     <thead>
      <tr>
          <th scope="col" class="th_center">Partner name</th>
          <th scope="col" class="th_center">Address</th>
          <th scope="col" class="th_center">Email</th>
          <th scope="col" class="th_center">Phone number</th>
          <th scope="col" class="th_center">Tour</th>
          <th scope="col" class="th_center">Recruitment</th>
          <th scope="col" class="th_center">Action</th>
      </tr>
     </thead>
      <tbody id="body">
      @if(isset($partners))
      @foreach($partners as $partner)
        <tr>
           <td scope="col">{{substr($partner->company_name,0,30)}}<span class="tooltip02" fulltext="{{$partner->company_name}}">.....</span></td>
           <td scope="col">{{substr($partner->address,0,30)}}<span class="tooltip02" fulltext="{{$partner->address}}">...</span></td>
           <td scope="col">{{$partner->email}}</td>
           <td scope="col" style="text-align: right;">{{$partner->phone}}</td>
           <td scope="col" style="text-align: center"><a class="fo3" status="{{$partner->company_name}}" href="{{url('admin/TOUR')}}/{{$partner->id}}">Tours</a></td>
           <td scope="col" style="text-align: center"><a class="fo3" status="{{$partner->company_name}}" href="{{url('admin/RE')}}/{{$partner->id}}">Recruitments</a></td>
           <td style="text-align: center"><a edit_id="{{$partner->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
          <a delete_id="{{$partner->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
      @endforeach
      @endif 
     </tbody>
</table>
@include('admin.Partner.viewPTjs')
