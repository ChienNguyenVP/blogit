<nav class="navbar navbar-custome navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-brand-custome" href="/">
                <img class="logo" src="{{ asset('logo.png') }}">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
             {{--    <li class="active"><a href="/">Trang chủ</a></li> --}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Học lập trình<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Laravel</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('blog.index')}}">Xem thêm</a></li>
                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                <li><a href="{{ asset('admin/login') }}">Đăng nhập</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form form-inline" id="form-search" action="{{ route('blog.search') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="q" class="form-control" placeholder="Nhập từ khóa tìm kiếm!">
                        <div class="input-group-btn">
                          <button class="btn btn-success" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                          </button>
                        </div>
                    </div>
                </form> 
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>