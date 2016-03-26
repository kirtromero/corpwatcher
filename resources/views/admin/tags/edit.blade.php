@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit {{ $tag->name }}</h1>
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
				<form role="form" action="/admin/tags/{{ $tag->id }}" method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<input type="hidden" name="_method" value="put" />
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="{{ $tag->name }}">
					</div>
					<div class="form-group">
						<label>Slug</label>
						<input class="form-control" type="text" name="slug" value="{{ $tag->slug }}">
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
