 <table class="table table-bordered" id="result_table">
     <thead>
      <tr>
          <th scope="col" class="th_center">Tour name</th>
          <th scope="col" class="th_center">Description</th>
          <th scope="col" class="th_center">Start day</th>
          <th scope="col" class="th_center">End day</th>
          <th scope="col" class="th_center">Action</th>
      </tr>
     </thead>
     <tbody id="body">
        @if(isset($tours))
        @foreach($tours as $tour)
          <tr>
             <td scope="col">{{substr($tour->tour_name,0,20)}}<a class="tooltip02" data-toggle="tooltip" data-placement="bottom" fulltext="{{$tour->tour_name}}">......</a></td>
             <td scope="col">{!!substr($tour->description,0,20)!!}<span class="tooltip02" fulltext="{{$tour->description}}" data-toggle="tooltip" data-placement="bottom">.......</span></td>
             <td scope="col" style="text-align: right;">{{$tour->start_date}}</td>
             <td scope="col" style="text-align: right;">{{$tour->end_date}}</td>
             <td style="text-align: center"><a edit_id="{{$tour->id}}" class="edit_ajax" id="modal" data-toggle="modal"  data-target="#myModal_Edit"><span class="glyphicon glyphicon-pencil"></span></a>
            <a delete_id="{{$tour->id}}"  class="simpleConfirm"><span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
        @endforeach
        @endif 
    </tbody>
</table>
@include('admin.Tour.viewTOURjs')