@extends('admin.admin_master')
@section('content_header')
	<section class="content-header">
	    <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb" style="left: 30px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Legal Services</a></li>
        <li class="active">Simple</li>
      </ol>
	</section>
@stop
@section('content')
    <p>Chọn ngôn ngữ muốn hiển thị!</p>
    <div id="translate_select"></div>
    <p>Freetuts.net là một blog cá nhân được xây dựng với mục đích chia sẻ 
        kiến thức về lập trình web nói chung và lập trình nói riêng. Blog được
        ra đời vào tháng 4 năm 2014 bởi cá nhân Cường, một lập trình viên tự 
        do và hiện nay đã về quê để sống một cuộc sống tự do, không bị gò bó
        bởi công nghệ và máy tính.
    </p>
@stop
@section('script')
   <script type="text/javascript"
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
   </script>
   <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'vi'}, 'translate_select');
    }
   </script>
@stop