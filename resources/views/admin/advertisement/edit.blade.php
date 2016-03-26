@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit {{ $company->name }}</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
@if (Session::has('success'))
<div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif
<!-- /.row -->
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Infomation
			</div>
			<div class="panel-body">
				<form role="form" action="/admin/companies/{{ $company->id }}" method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<input type="hidden" name="_method" value="put" />
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="{{ $company->name }}">
					</div>
					<div class="form-group">
						<label>URL</label>
						<input class="form-control" type="text" name="url" value="{{ $company->url }}">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input class="form-control" type="text" name="address" value="{{ $company->address }}">
					</div>
					<div class="form-group">
						<label>City</label>
						<input class="form-control" type="text" name="city" value="{{ $company->city }}">
					</div>
					<div class="form-group">
						<label>State</label>
						<input class="form-control" type="text" name="state" value="{{ $company->state }}">
					</div>
					<div class="form-group">
						<label>Country</label>
						<input class="form-control" type="text" name="country" value="{{ $company->country }}">
					</div>
					<div class="form-group">
						<label>Category</label>
						<input class="form-control" type="text" name="category_id" value="{{ $company->category_id }}">
					</div>
					<div class="form-group">
						<label>Sub Category</label>
						<input class="form-control" type="text" name="sub_category_id" value="{{ $company->sub_category_id }}">
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="text" name="phone" value="{{ $company->phone }}">
					</div>
					<div class="form-group">
						<label>Fax</label>
						<input class="form-control" type="text" name="fax" value="{{ $company->fax }}">
					</div>
					<button type="submit" class="btn btn-success">Update</button>
					<button type="reset" class="btn btn-warning">Reset Form</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->
@endsection
