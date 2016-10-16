<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
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
                    <li><a href="{{ url('/home') }}">Trang chủ</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                
                <li><a href="{{ url('register') }}">Đăng ký</a></li>
                <li><a href="{{ url('login') }}">Đăng nhập</a></li>
            </ul>
        </div>
    </div>
</div>