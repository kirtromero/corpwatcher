@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Companies <a href="/admin/companies/create" class="btn btn-xs btn-default">Add New</a></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@if (Session::has('success'))
<div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>Name</th>
					<th>URL</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Country</th>
					<th>Category</th>
					<th>Sub Category</th>
					<th>Phone</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($companies as $company)
				<tr>
					<td>{{ $company->name }}</td>
					<td>{{ $company->url }}</td>
					<td>{{ $company->address }}</td>
					<td>{{ $company->city }}</td>
					<td>{{ $company->state }}</td>
					<td>{{ $company->country }}</td>
					<td>{{ $company->category_id }}</td>
					<td>{{ $company->subcategory_id }}</td>
					<td>{{ $company->phone }}</td>
					<td><a href="/admin/companies/{{ $company->id }}/edit" class="btn btn-primary">Edit</a>
						<form action="/admin/companies/{{ $company->id }}" method="POST">
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
							<input type="hidden" name="_method" value="DELETE" />
							<input type="submit" value="Delete" class="btn btn-danger">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- /.row -->
@endsection
