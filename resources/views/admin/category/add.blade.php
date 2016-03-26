@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add A new Category</h1>
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
				<form role="form" action="/admin/categories" method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="" required>
					</div>
					<div class="form-group">
						<label>Fontawesome Icon</label>
						<input class="form-control" type="text" name="icon" value="" required>
					</div>
					<button type="submit" class="btn btn-success">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->
@endsection
