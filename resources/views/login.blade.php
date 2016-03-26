@extends('layout')

@section('content')
<h1 class="page-header">
Login
</h1>
<div class="well text-center">
	<form method="POST" action="/auth/login">

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
</div>
@endsection
