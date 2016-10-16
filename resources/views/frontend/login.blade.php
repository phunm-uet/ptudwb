
@extends('layouts.app')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/login.css') }}">
@stop
@section('content')
<div class="container">
	<div class="col-xs-4 col-xs-offset-4 form-login well">
		<img class="img-circle logo" src="http://icons.veryicon.com/ico/System/Plump/Document%20write.ico" style="width: 20%;height: 20%;"></img>
		<form action="" method="POST" role="form">
			<legend class="text-center">Sign in</legend>
			{{ csrf_field() }}
			@if (Session::has("register_success"))
					<div class="alert" role="alert">
					<strong>Well done!</strong> Dang ky tai khoan thanh cong. Vui long xac nhan email <br>
					</div>			
			@endif
			<div class="form-group">
				<label for="username">Username</label>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
					<input type="text" class="form-control" id="username" placeholder="Username" name="username">
				</div>
			</div>
			{{-- End of Username Input --}}
			<div class="form-group">
				<label for="username">Password</label>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
					<input type="password" class="form-control" id="password" placeholder="Password" name="password">
				</div>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="" name="remember">
					Remenber Me
				</label>
			</div>
			<button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;padding-bottom: 10px" id="login">
			<i class="fa fa-spinner fa-spin fa-fw" style="display: none"></i>   Login</button>
		</form>
		<div class="forget col-xs-6 left" style="padding-top: 20px;">
			<a href="{{ url('/register') }}" title="Forget Password">Register</a>
		</div>
		<div class="forget col-xs-6 right" style="padding-top: 20px;">
			<a href="{{ url('/forget') }}" title="Forget Password">Forget Password?</a>
		</div>		
	</div>
</div>
@endsection

@section('script')
    <script src="{{ asset('public/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <script src=" {{ asset('public/js/loginvalidate.js') }}"></script>

@stop