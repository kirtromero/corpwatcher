@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tags <a href="/admin/tags/create" class="btn btn-xs btn-default">Add New</a></h1>
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
					<th>Slug</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($tags as $tag)
				<tr>
					<td>{{ $tag->name }}</td>
					<td>{{ $tag->slug }}</td>
					<td><a href="/admin/tags/{{ $tag->id }}/edit" class="btn btn-primary">Edit</a>
						<form action="/admin/tags/{{ $tag->id }}" method="POST">
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
