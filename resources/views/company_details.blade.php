@extends('layout')

@section('content')
<ol class="breadcrumb">
	<li><a href="/">Home</a></li>
	<li><a href="/category/{{ $company->category->slug }}">{{ $company->category->name }}</a></li>
	<li><a href="/subcategory/{{ $company->subcategory->slug }}">{{ $company->subcategory->name }}</a></li>
	<li class="active"><a href="/company-details/{{ $company->slug }}">{{ stripslashes($company->name) }}</a></li>
</ol>
<h1 class="page-header">{{ stripslashes($company->name) }}</h1>
<div class="well">
	<h4>Company Info</h4>
	<p>Addess: {{ $company->address }}</p>
	<p>City: {{ $company->city }}</p>
	<p>State/Province: {{ $company->state }}</p>
	<p>Country: {{ $company->country }}</p>
	<p>Contact: {{ $company->phone }}</p>
	<p>Website: <a href="http://{{ $company->url }}">{{ $company->url }}</a></p>
	<p>Category: <a href="/category/{{ $company->category->slug }}">{{ $company->category->name }}</a></p>
	<p>Sub Category: <a href="/subcategory/{{ $company->subcategory->slug }}">{{ $company->subcategory->name }}</a></p>
	<p>Tags:</p>
	<p>Description: {{ $company->profile }}</p>
	<div class='text-center'>
		<!-- AddToAny BEGIN -->
		<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
		<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
		<a class="a2a_button_facebook"></a>
		<a class="a2a_button_twitter"></a>
		<a class="a2a_button_google_plus"></a>
		<a class="a2a_button_email"></a>
		<a class="a2a_button_pinterest"></a>
		<a class="a2a_button_linkedin"></a>
		<a class="a2a_button_stumbleupon"></a>
		<a class="a2a_button_tumblr"></a>
		<a class="a2a_button_reddit"></a>
		</div>
		<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
		<!-- AddToAny END -->
	</div>
</div>
<hr>
@if($similar_companies)
<div class="well">
	<h2>Similar Companies</h2>
	<div class="row">
		@foreach($similar_companies as $company)
		<div class="col-md-6 similar_boxes">
			@include('item')
		</div>
		@endforeach
	</div>
</div>
@endif

@endsection
