@extends('layout')

@section('content')
<ol class="breadcrumb">
	<li><a href="/">Home</a></li>
	<li class="active"><a href="/search/{{ $search }}">{{ $search}}</a></li>
</ol>
<h1 class="page-header">
	Search Result for {{ $search }}
</h1>
<div class="well">
	<div class="row">
		@if($count > 0)
			<h4 class="col-md-12">We found {{ $count }} results</h4>
			@foreach($companies as $company)
			<div class="col-md-12 similar_boxes">
				@include('item')
			</div>
			@endforeach
		@else
		<div class="col-md-12 text-center">
			No Result(s) Found
		</div>
		@endif
	</div>
	<div class="row text-center">
		<div class="col-md-12">
		{!! $companies->render() !!}
		</div>
	</div>
	<!-- /.row -->
</div>
<hr>
@endsection
