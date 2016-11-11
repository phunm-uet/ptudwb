@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
    <div class="col-xs-8 col-xs-offset-2" style="background-color: #fff;padding:20px;">
      <form action="{{ url('updateprofile') }}" method="POST" enctype="multipart/form-data">
      <h3 class="text-center">Edit Profile</h3>
      <hr>
      {{ csrf_field() }}
          <div class="col-md-3">
            <div class="text-center">
              <img src="{{ asset('storage/avatar/'.Auth::user()->avatar ) }}" class="avatar img-circle" id="avatar" alt="avatar" style="width: 150px;height: 150px">
              <h6>Upload avatar</h6>
              
              <input type="file" class="form-control" id="choose" accept="image/*" name="avatar">
            </div>
          </div>
          
          <!-- edit form column -->
           <div class="col-md-8 personal-info">
            @if (Session::has("success"))
                <div class="alert alert-info alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a> 
                  <i class="fa fa-coffee"></i>
                  Update thành công
                </div>
            @endif

            @if (Session::has("wrong_pass"))
                <div class="alert alert-danger alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a> 
                  <i class="fa fa-coffee"></i>
                  Mật khẩu không đúng
                </div>
            @endif
            @if (Session::has("empty_pass"))
                <div class="alert alert-danger alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a> 
                  <i class="fa fa-coffee"></i>
                    Mật khẩu mới không được bỏ trống
                </div>
            @endif     
            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="{{Auth::user()->name}}" name="name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="{{Auth::user()->email}}" disabled="true">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" name="old_password">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">New Password</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" value="" name="new_password">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <input type="submit" class="btn btn-primary" value="Save Changes">
                  <span></span>
                  <input type="reset" class="btn btn-default" value="Cancel">
                </div>
              </div>
            </div>
          </div>      
      </form>      
    </div>


  </div>
</div>

@stop
@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $("#choose").on("change",function(event){
        var input = event.target;
          var reader = new FileReader();
          reader.onload = function (){
            var dataURL = reader.result;
            $("#avatar").attr("src",dataURL);
          }
          reader.readAsDataURL(input.files[0]);
      })
    });
  </script>
@stop