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
						<input class="form-control" type="text" name="name" value="">
					</div>
					<div class="form-group">
						<label>URL</label>
						<input class="form-control" type="text" name="url" value="">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input class="form-control" type="text" name="address" value="">
					</div>
					<div class="form-group">
						<label>City</label>
						<input class="form-control" type="text" name="city" value="">
					</div>
					<div class="form-group">
						<label>State</label>
						<input class="form-control" type="text" name="state" value="">
					</div>
					<div class="form-group">
						<label>Country</label>
						<input class="form-control" type="text" name="country" value="">
					</div>
					<div class="form-group">
						<label>Category</label>
						<input class="form-control" type="text" name="category_id" value="">
					</div>
					<div class="form-group">
						<label>Sub Category</label>
						<input class="form-control" type="text" name="sub_category_id" value="">
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
