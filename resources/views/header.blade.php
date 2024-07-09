<div class="header-wrapper">
            <div class="container-fluid">
                <div id="navbar" class="row">
                    <div class="menu col-12 d-flex align-items-center justify-content-between">
                        <div class="header-logo">
                            <h2>TIENDAT</h2>
                        </div>
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <div class="header-nav collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link head-color fs-6 px-3" aria-current="page" href="{{route('home')}}">Trang
                                                chủ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link head-color fs-6 px-3" href="{{route('products')}}">Cửa hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link head-color fs-6 px-3" href="{{route('contact')}}">Liên hệ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link head-color fs-6 px-3" href="{{route('blog')}}">Tin tức</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link head-color fs-6 px-3" href="{{route('about')}}">Giới thiệu</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="header-left navbar navbar-expand-lg">
                            <ul class="navbar-nav">
                                <li class=" position-relative nav-item">
                                    <a href="{{ asset('cart') }}" class="nav-link fs-6">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </a>
                                    <span style="font-size: 10px;"
                                        class="position-absolute top-0 start-50 badge rounded-pill bg-danger">
                                       {{$carts->count()}}
                                    </span>
                                </li>
                                <li class="nav-item">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </li>
                                
                                <li class="nav-item">
                                    @auth
                                        <a class="nav-link head-color fs-6" href="{{ route('user', ['id' => auth()->user()->id]) }}">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                    @else
                                        {{-- Hiển thị nút đăng nhập khi người dùng chưa đăng nhập --}}
                                        <a class="nav-link head-color fs-6" href="{{ route('login') }}">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                    @endauth
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <form class="col-6 search" action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <input name="key" class="form-control" type="text" placeholder="Tìm kiếm">
                            <button class="btn input-group-button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            </div>
        </div>