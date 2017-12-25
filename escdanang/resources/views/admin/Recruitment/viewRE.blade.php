<table class="table table-bordered" id="result_table">
     <thead>
      <tr>
          <th scope="col" class="th_center">Title</th>
          <th scope="col" class="th_center">Short description</th>
          <th scope="col" class="th_center">Content </th>
          <th scope="col" class="th_center">Position</th>
          <th scope="col" class="th_center">Start day</th>
          <th scope="col" class="th_center">Expiry day</th>
          <th scope="col" class="th_center">Action</th>
      </tr>
     </thead>
    <tbody id="body">
      @if(isset( $recruitments))
      @foreach( $recruitments as  $recruitment)
        <tr>
           <td scope="col">{{substr($recruitment->title,0,20)}}<span class="tooltip02" data-toggle="tooltip" data-placement="bottom" fulltext="{{$recruitment->title}}">......</span></td>
           <td scope="col">{{substr($recruitment->description,0,20)}}<span class="tooltip02" data-toggle="tooltip" data-placement="bottom" fulltext="{{$recruitment->description}}">......</span></td>
           <td scope="col">{!!substr($recruitment->content,0,20)!!}<span class="tooltip02" data-toggle="tooltip" data-placement="bottom" fulltext="{{$recruitment->content}}">......</span></td>
           <td scope="col">{{$recruitment->position}}</td>
           <td scope="col" style="text-align: right;">{{$recruitment->submit_date}}</td>
           <td scope="col" style="text-align: right">{{$recruitment->expiry_date}}</td>
           <td style="text-align: center"><a edit_id="{{$recruitment->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
          <a delete_id="{{$recruitment->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
      @endforeach
      @endif 
     </tbody>
</table>
@include('admin.Recruitment.viewREjs')