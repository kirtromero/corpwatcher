@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add A Sub Category</h1>
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
				<form role="form" action="/admin/subcategories" method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="" required>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select id="category_id" name="category_id" class="form-control" required>
							@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-success">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->
@endsection
