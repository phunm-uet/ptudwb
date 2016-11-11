
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
                    <img src="https://freeiconshop.com/files/edd/book-open-outline-filled.png" alt="" style="width: 30px;height: 30px">
                </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
            </ul>

            <ul class="nav navbar-nav pull-right">
                @if (Auth::check())
                     <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('storage/avatar/'.Auth::user()->avatar ) }}" class="img-circle" alt="" style="width: 25px;height: 25px;"> {{ Auth::user()->name }}
                      <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
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