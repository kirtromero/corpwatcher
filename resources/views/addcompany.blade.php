@extends('layout')

@section('content')
<div class="well">
	<h4>Add your comapany to Corpwatcher.com</h4>
	<form class="form-horizontal">
		<div class="form-group">
			<label for="name" class="col-sm-3 control-label">Company Name:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="name" id="name">
			</div>
		</div>
		<div class="form-group">
			<label for="profile" class="col-sm-3 control-label">Describe you Company:</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="profile" id="profile"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="url" class="col-sm-3 control-label">Company Website:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="url" id="url" placeholder="www.example.com">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-3 control-label">Company Address:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="address" id="address">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="col-sm-3 control-label">Company City:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="city" id="city">
			</div>
		</div>
		<div class="form-group">
			<label for="state" class="col-sm-3 control-label">Company State/Province:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="state" id="state">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="col-sm-3 control-label">Country:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="country" id="country">
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="col-sm-3 control-label">Phone:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="phone" id="phone">
			</div>
		</div>
		<div class="form-group">
			<label for="fax" class="col-sm-3 control-label">Fax:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="fax" id="fax">
			</div>
		</div>
		<div class="form-group">
			<label for="category_id" class="col-sm-3 control-label">Category:</label>
			<div class="col-sm-9">
				<select class="form-control" name="category_id" id="category_id">
					<option value="">Choose a category</option>
					@foreach($categories AS $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="sub_category_id" class="col-sm-3 control-label">Sub Category:</label>
			<div class="col-sm-9">
				<select class="form-control" name="sub_category_id" id="sub_category_id">
					<option value="">Choose a sub category</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="tags" class="col-sm-3 control-label">Tags:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="tags" id="tags">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-center">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>
	</form>
</div>
@endsection
