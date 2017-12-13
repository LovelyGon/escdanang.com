@extends('admin.admin_master')
@section('content')
<div>dddddddddd</div>
@stop
@section('script')
<script>
  $('#services').click(function(){
     $.ajax({
        type: "get",
        url: 'getSVpage',
        success:function(data){
          $('#result').html(data);
        }
  });
</script>
@stop