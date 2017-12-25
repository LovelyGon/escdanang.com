<table class="table table-bordered" id="result_table">
     <thead>
      <tr>
          <th class="th_center" scope="col">Services name</th>
          <th class="th_center" scope="col">Services price</th>
          <th class="th_center" scope="col">Services type</th>
          <th class="th_center" scope="col">Short Description</th>
          <th class="th_center" scope="col">Description</th>
          <th class="th_center" scope="col">Action</th>
      </tr>
     </thead>
      <tbody id="body">
        @if(isset($services))
          @foreach($services as $sv)
          <tr>
            <td scope="col">{{substr($sv->service_name,0,15)}}<span class="tooltip02" fulltext="{{$sv->service_name}}">......</span></td>
            <td scope="col" style="text-align: right">{{$sv->price}}</td>
            <td scope="col">{{$sv->type_of_service}}</td>
            <td scope="col">{{substr($sv->short_description,0,15)}}<span  class="tooltip02" fulltext="{{$sv->short_description}}">.....</span></td>
            <td scope="col">{!!substr($sv->description,0,15)!!}<span  class="tooltip02" fulltext="{{$sv->description}}">.....</span></td>
            <td scope="col" style="text-align: center"><a edit_id="{{$sv->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
            <a delete_id="{{$sv->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
          @endforeach
        @endif  
     </tbody>
</table>
@include('admin.Service.viewajaxjs')
