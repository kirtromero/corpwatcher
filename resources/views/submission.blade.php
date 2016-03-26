@extends('layout')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<h1 class="page-header">Add A Business</h1>
<div class="well text-left">
	<form class="form-horizontal" method="POST" action="/submission/add">
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<h4>We Need Your Information</h4>
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Your Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" placeholder="Juan Dela Cruz" required>
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="email" placeholder="Email" required>
			</div>
		</div>
		<hr>
		<h4>Your Company's Information</h4>
		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="name" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">URL</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="url" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Address</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="address" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">City</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="city" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">State</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="state" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Country</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="country" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Category</label>
			<div class="col-sm-10">
				<select id="category_id" name="category_id" class="form-control" required>
					<option value="">Select A Category</option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Sub Category</label>
			<div class="col-sm-10">
				<select id="sub_category_id" name="sub_category_id" class="form-control" required>
					<option value="">Select A Sub Category</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Phone</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="phone" value="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Fax</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="fax" value="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Captcha</label>
			<div class="col-sm-10">
				<div class="g-recaptcha" data-sitekey="6LeFIBITAAAAADDGK6gKsPPpD9YLZiLb3i3p5xFu"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary btn-lg">Submit</button>
			</div>
		</div>
	</form>
</div>
@endsection
