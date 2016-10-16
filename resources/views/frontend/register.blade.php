
@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/login.css') }}">
@stop
@section('content')
<div class="container">
    <div class="col-xs-4 col-xs-offset-4 register-login well">
        <img class="img-circle logo" src="http://icons.veryicon.com/ico/System/Plump/Document%20write.ico" style="width: 20%;height: 20%;"></img>
        <form action="" method="POST" role="form" name="register">
            <div id="errors">
                @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <span class="sr-only">Error:</span>
                        <li>{{$error}}</li>
                    @endforeach
                </div>
                @endif
            </div>
            <legend class="text-center">Sign Up</legend>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="username">Name</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" required="true"
                    value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" required="true" value="{{ old('username') }}">
                </div>
            </div>
            {{-- End of Username Input --}}

            <div class="form-group">
                <label for="username">Email</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="true" value="{{ old('email') }}">
                </div>
            </div>
            {{-- End of Email --}}
            <label>Gioi tinh</label><br>
                
                  <label class="radio-inline"><input type="radio" name="sex" value="0" >Nam</label>
                  <label class="radio-inline"><input type="radio" name="sex value="1" >Nu</label>
            <div class="form-group">
                <label for="username">Password</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                    <input type="password" class="form-control" id="password" name="password" required="true" placeholder="Password">
                </div>
            </div>
            {{-- End of Password --}}
            <div class="form-group">
                <label for="username">Confirm Password</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="true" placeholder="Confirm Password">
                </div>
            </div>              
            {{-- End of Confirm Psssword --}}
            <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;padding-bottom: 10px">Sign Up</button>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('public/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/js/validate.js') }}" type="text/javascript"></script>
@stop
