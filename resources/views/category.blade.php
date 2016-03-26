@extends('layout')

@section('content')
<ol class="breadcrumb">
	<li><a href="/">Home</a></li>
	<li class="active"><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></li>
</ol>
<h1 class="page-header">
	{{ $category->name }}
</h1>
<div class="well">
	<div class="row">
		@foreach($companies as $company)
		<div class="col-md-6 similar_boxes">
			@include('item')
		</div>
		@endforeach
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
