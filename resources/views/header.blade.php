<!-- Start Header Area -->

<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><img src="/template/img/logo.png" alt="" width="100px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item "><a class="nav-link" href="/">Trang chủ</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="{{route('products')}}" class="nav-link ">Shop</a>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Phân loại sản phẩm</a>
                            <ul class="dropdown-menu">
                                {!! \App\Helper\Helper::menus($menus) !!}
{{--                                <li class="nav-item"><a class="nav-link" href="blog.html"></a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="single-blog.html"></a></li>--}}
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="/contact">Liên hệ</a></li>
                        <li class="nav-item">
                            @guest
                                <a class="nav-link" href="{{ route('login') }}">Đăng Nhập</a>
                            @endguest
                        </li>
                        <li class="nav-item">
                            @guest
                                <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                            @endguest
                        </li>
                        @auth
                            <li class="nav-item submenu dropdown">
                                <a class="nav-link" href="#">
                                    <i class="fa-solid fa-user"></i> {{ Arr::last(explode(' ', Auth::user()->name)) }}

                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="/order">Xem đơn hàng</a></li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Đăng Xuất
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="/carts" class="cart"><span class="ti-bag"></span></a></li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->
