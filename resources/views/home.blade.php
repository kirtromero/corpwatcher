@extends('layout')

@section('content')
<h1 class="page-header">WHAT ARE YOU LOOKING FOR?</h1>
<div class="well">
	<h2>
		Search by Category <small><a href="/category" class="btn-sm">See All</a> </small>
	</h2>

	<div class="row">
		<div class="col-lg-4">
			<ul class="list-unstyled category-list">
				@foreach($categories as $key => $category)
				<li><a href="/category/{{ $category->slug }}">{!! $category->icon !!}  {{ $category->name }}</a></li>
				@if(($key + 1)  % 4 == 0)</ul></div><div class="col-lg-4 col-sm-12"><ul class="list-unstyled category-list">@endif
				@endforeach
			</ul>
		</div>
	</div>
	<!-- /.row -->
</div>
<hr>
<div class="well">
	<h2>Recently Added Companies</h2>
	<div class="row">
		@foreach($companies as $company)
		<div class="col-md-6 similar_boxes">
			@include('item')
		</div>
		@endforeach
	</div>
	<!-- /.row -->
</div>
@endsection
