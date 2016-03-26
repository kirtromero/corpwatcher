@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add A new Company</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Infomation
			</div>
			<div class="panel-body">
				<form role="form" action="/admin/companies" method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="" required>
					</div>
					<div class="form-group">
						<label>URL</label>
						<input class="form-control" type="text" name="url" value="" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input class="form-control" type="text" name="address" value="" required>
					</div>
					<div class="form-group">
						<label>City</label>
						<input class="form-control" type="text" name="city" value="" required>
					</div>
					<div class="form-group">
						<label>State</label>
						<input class="form-control" type="text" name="state" value="" required>
					</div>
					<div class="form-group">
						<label>Country</label>
						<input class="form-control" type="text" name="country" value="" required>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select id="category_id" name="category_id" class="form-control" required>
							<option value="">Select A Category</option>
							@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Sub Category</label>
						<select id="sub_category_id" name="sub_category_id" class="form-control" required>
							<option value="">Select A Sub Category</option>
						</select>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="text" name="phone" value="">
					</div>
					<div class="form-group">
						<label>Fax</label>
						<input class="form-control" type="text" name="fax" value="">
					</div>
					<button type="submit" class="btn btn-success">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->
@endsection
