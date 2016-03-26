@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit {{ $subcategory->name }}</h1>
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
				<form role="form" action="/admin/subcategories/{{ $subcategory->id }}" method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<input type="hidden" name="_method" value="put" />
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="{{ $subcategory->name }}" required>
					</div>
					<div class="form-group">
						<label>Slug</label>
						<input class="form-control" type="text" name="slug" value="{{ $subcategory->slug }}" required>
					</div>
					<div class="form-group">
						<label>Fax</label>
						<select name="category_id" id="category_id" class="form-control">
						@foreach($categories as $category)
						<option  value="{{ $category->id }}" @if($category->id == $subcategory->category->id)selected="selected"@endif>{{ $category->name }}</option>
						@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-success">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->
@endsection
