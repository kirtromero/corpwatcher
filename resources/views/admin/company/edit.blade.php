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
						<input class="form-control" type="text" name="name" value="{{ $company->name }}" required>
					</div>
					<div class="form-group">
						<label>URL</label>
						<input class="form-control" type="text" name="url" value="{{ $company->url }}">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input class="form-control" type="text" name="address" value="{{ $company->address }}" required>
					</div>
					<div class="form-group">
						<label>City</label>
						<input class="form-control" type="text" name="city" value="{{ $company->city }}" required>
					</div>
					<div class="form-group">
						<label>State</label>
						<input class="form-control" type="text" name="state" value="{{ $company->state }}" required>
					</div>
					<div class="form-group">
						<label>Country</label>
						<input class="form-control" type="text" name="country" value="{{ $company->country }}" required>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select id="category_id" name="category_id" class="form-control" required>
							@foreach($categories as $category)
							<option value="{{ $category->id }}" @if($company->category_id == $category->id)selected="selected"@endif>{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Sub Category</label>
						<select id="sub_category_id" name="sub_category_id" class="form-control" required>
							@foreach($subcategories as $subcategory)
							<option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="text" name="phone" value="{{ $company->phone }}">
					</div>
					<div class="form-group">
						<label>Fax</label>
						<input class="form-control" type="text" name="fax" value="{{ $company->fax }}">
					</div>
					<div class="form-group">
						<label>Tags</label>
						<select class="form-control select2tags" id="tags" name="tags[]" multiple>
							@foreach($tags as $tag)
							<option value="{{ $tag->id }}" @if(in_array($tag->id, $company_tags)) selected="selected" @endif>{{ $tag->name }}</option>
							@endforeach
						</select>
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
