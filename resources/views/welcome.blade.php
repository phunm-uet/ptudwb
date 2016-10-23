@extends('layouts.app')

@section('content')
<div class="container1">
    <div class="col-xs-12">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                @if (Session::has("register_success"))
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> This alert box could indicate a successful or positive action.
                  </div> 
                @endif
                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
