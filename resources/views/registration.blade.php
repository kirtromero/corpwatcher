@extends('layout')

@section('content')
<h1 class="page-header">Register</h1>
<div class="well text-left">
	<form class="form-horizontal" method="POST" action="/auth/register">
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" placeholder="Jua Dela Cruz" required>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="email" placeholder="Email" required>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="password" placeholder="Password" required>
			</div>
		</div>
		<div class="form-group">
			<label for="password_confirmation" class="col-sm-2 control-label">Confirm Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary btn-lg">Sign in</button>
			</div>
		</div>
	</form>
</div>
@endsection
