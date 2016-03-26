@extends('layout')

@section('content')
<h1 class="page-header">Clan Search</h1>
<div class="well text-left">
		<input type="text" name="name" class="form-control" id="name">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button id="clansearch">Search</button>

		<ul id="results"></ul>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
	$("#clansearch").click(function(){
		$.ajax({
		  url: "/clansearch",
		  method: "post",
		  data: { name: $("#name").val(), _token: "{{ csrf_token() }}" }
		}).done(function(results) {
			console.log(results);
			 data = JSON.parse(results);
		    $(data.items).each(function (index, ele) {
		       alert(ele.name);
		    });
		});
	});
});
</script>
@endsection
