<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="col-xs-12">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('public/image/book.png') }}" alt="logo" style="height: 40px;width: auto">
                </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
            </ul>
            <ul>
                <form class="navbar-form navbar-left" method="GET" action="search">
                <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" placeholder="Search" name="search">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default"><span class="fa fa-search fa-spin"></span></button>
                    </span>
                </div>
              </form>                    
            </ul>

            <ul class="nav navbar-nav pull-right">
                @if (Auth::check())
                    <li>
                        <a href="{{ asset('upload') }}"><i class="fa fa-upload"></i>      Upload</a>
                    </li>
                     <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }}
                      <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Edit Profile</a></li>
                        <li><a href="#">TimeLine</a></li>
                        <li><a href="{{ url('logout') }}"> <i class="fa fa-sign-out"></i>   Đăng xuất</a></li>
                    </ul>
                    </li>
                @else

                    <li><a href="{{ url('login') }}"><span class="glyphicon glyphicon-log-in"></span>    Đăng nhập</a></li>
                    <li><a href="{{ url('register') }}"> <span class="glyphicon glyphicon-user"></span>    Đăng ký</a></li>                    
                @endif
            </ul>
        </div>
    </div>
</nav>