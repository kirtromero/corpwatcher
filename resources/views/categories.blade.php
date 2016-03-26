@extends('layout')

@section('content')
<ol class="breadcrumb">
	<li><a href="/">Home</a></li>
	<li class="active"><a href="/category">All Categories</a></li>
</ol>
<h1 class="page-header">
	Categories
</h1>
<div class="well">
	<div class="row">
		@foreach($categories as $category)
		<h2 class="col-md-12">{{ $category->name }}</h2>
		<div class="col-lg-4 col-sm-12">
			<ul class="list-unstyled">
				@foreach($category->subcategory as $key => $subcategory)
				<li><a href="/subcategory/{{ $subcategory->slug }}">{{ $subcategory->name }}</a></li>

				@if(($key + 1) % 4 == 0)</ul></div><div class="col-lg-4 col-sm-12"><ul class="list-unstyled">@endif

				@endforeach
			</ul>
		</div>
		<div class="clearfix"></div>
		@endforeach
	</div>
	<!-- /.row -->
</div>
<hr>
@endsection
