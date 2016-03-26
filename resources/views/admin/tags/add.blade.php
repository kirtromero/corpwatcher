@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add new tag</h1>
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
				<form role="form" action="/admin/tags" method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="">
					</div>
					<button type="submit" class="btn btn-success">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->
@endsection
