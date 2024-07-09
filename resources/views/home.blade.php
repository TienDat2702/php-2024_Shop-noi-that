@extends('layoutHome')
@section('title', 'Trang chủ')
@section('content')
    <!-- Slide -->
    <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active btn-carousel"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" class="btn-carousel"
                aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner carousel-inner-banner">
            <div class="carousel-item carousel-item-banner active" data-bs-interval="10000">
                <img src="img/slider-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Bộ sư tập mới</h4>
                    <h2>Ghế sang trọng <br> Thiết kế </h2>
                    <a class="btn btn-lg" href="#">Xem ngay </a>
                </div>
            </div>
            <div class="carousel-item carousel-item-banner" data-bs-interval="2000">
                <img src="img/slider-2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Bộ sư tập mới</h4>
                    <h2>Best Of NeoCon <br> Gold Award </h2>
                    <a class="btn btn-lg" href="#">shop now </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="icon-prev" aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="icon-next" aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end slide -->
    <!-- danh mục -->
    <div class="category-section">
        <div class="container-fluid">
            <div class="row">

                <div class="pst-r col-lg-6 col-12 mb-5">
                    <div class="hover">
                        <a href="">
                            <div class="banner-image">
                                <a href="{{ route('categories', $categoryHot->id) }}"> <img class="img-fluid"
                                        src="{{ asset('uploads/category/' . $categoryHot->image) }}" alt=""></a>
                            </div>
                            <div class="banner-content">
                                <a href="{{ route('categories', $categoryHot->id) }}">
                                    <h4 class="title">{{ $categoryHot->name }}</h4>
                                </a>
                                <h5 class="sub-title my-3">{!! $categoryHot->description !!}</h5>
                                <a class="btn btn-lg btn-outline-dark"
                                    href="{{ route('categories', $categoryHot->id) }}"><span
                                        class="d-flex align-items-center">Khám phá<i
                                            class="fa-solid fa-arrow-right mx-2"></i></span></a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-5">
                    <div class="banner-left">
                        <div class="row">
                            @foreach ($categoriesHot as $item)
                                <div class="pst-r col-lg-6 col-sm-6 mb-4">
                                    <div class="hover">
                                        <a href="{{ route('categories', $item->id) }}">
                                            <div class="banner-image">
                                                <a href="{{ route('categories', $item->id) }}"> <img class="img-fluid"
                                                        src="{{ asset('uploads/category/' . $item->image) }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="banner-content">
                                                <a href="{{ route('categories', $item->id) }}">
                                                    <h4 class="title">{{ $item->name }}</h4>
                                                </a>
                                                <a class="btn btn-lg" href="{{ route('categories', $item->id) }}">Xem
                                                    ngay</a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end danh mục -->
    <!-- sản phẩm mới -->
    <div class="product">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sản phẩm
                        mới</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sản phẩm
                        bán
                        chạy</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                        type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Sản phẩm
                        xem
                        nhiều</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="product-new my-5">
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($products_new->chunk(4) as $chunk)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <div class="row">
                                            @foreach ($chunk as $item)
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="product-hover">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="image">
                                                                <a href="{{ route('productsdetail', $item->id) }}">
                                                                    <img src="{{ asset('uploads/products/' . $item->image) }}"
                                                                        class="card-img-top" alt="...">
                                                                </a>

                                                                {{-- thanh điều khiển --}}
                                                                <div
                                                                    class="action-link d-flex align-items-center justify-content-between">
                                                                    <div class="action-link-left">
                                                                        @auth
                                                                            <!-- Chuyển href thành form để gửi POST -->
                                                                            <form action="{{ route('cart.add', $item->id) }}"
                                                                                method="POST" class="add-to-cart-form">
                                                                                @csrf
                                                                                <input type="hidden" name="quantity"
                                                                                    value="1">
                                                                                <button type="submit" class="link">Thêm giỏ
                                                                                    hàng</button>
                                                                            </form>
                                                                        @else
                                                                            <a title="Thêm vào giỏ hàng" class="link"
                                                                                href="{{ route('login') }}"
                                                                                onclick="alert('Bạn cần đăng nhập để thêm vào giỏ hàng')">Thêm
                                                                                giỏ hàng</a>
                                                                        @endauth

                                                                    </div>
                                                                    <div class="action-link-right">
                                                                        <a href="{{ route('productsdetail', $item->id) }}"
                                                                            class="link">
                                                                            <i class="fa-regular fa-eye"></i>
                                                                        </a>
                                                                        <a href="#" class="link favorite-toggle"
                                                                            data-product-id="{{ $item->id }}"
                                                                            data-favorite="{{ $item->is_favorite ? 'true' : 'false' }}">
                                                                            <i
                                                                                class="fa-{{ $item->is_favorite ? 'solid' : 'regular' }} fa-heart"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                {{-- end thanh điều khiển --}}

                                                            </div>
                                                            <div class="product-content py-3">
                                                                <h6 class="card-text product-name">
                                                                    <a class="text-black text-decoration-none"
                                                                        href="#">{{ $item->name }}</a>
                                                                </h6>
                                                                <span class="price">
                                                                    @if (!$item->price_sale)
                                                                        {{ number_format($item->price, 0, '.', ',') }} VNĐ
                                                                    @else
                                                                        <del>{{ number_format($item->price, 0, '.', ',') }}
                                                                            VNĐ</del>
                                                                        {{ number_format($item->price_sale, 0, '.', ',') }}
                                                                        VNĐ
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev bor" type="button" data-bs-target="#productCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next bor" type="button" data-bs-target="#productCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="product-hot my-5">
                        <div id="productCarouselSold" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($products_sold->chunk(4) as $chunk)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <div class="row">
                                            @foreach ($chunk as $item)
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="product-hover">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="image">
                                                                <a href="{{ route('productsdetail', $item->id) }}">
                                                                    <img src="{{ asset('uploads/products/' . $item->image) }}"
                                                                        class="card-img-top" alt="...">
                                                                </a>
                                                                <div
                                                                    class="action-link d-flex align-items-center justify-content-between">
                                                                    <div class="action-link-left">
                                                                        @auth
                                                                            <!-- Chuyển href thành form để gửi POST -->
                                                                            <form action="{{ route('cart.add', $item->id) }}"
                                                                                method="POST" class="add-to-cart-form">
                                                                                @csrf
                                                                                <input type="hidden" name="quantity"
                                                                                    value="1">
                                                                                <button type="submit" class="link">Thêm giỏ
                                                                                    hàng</button>
                                                                            </form>
                                                                        @else
                                                                            <a title="Thêm vào giỏ hàng" class="link"
                                                                                href="{{ route('login') }}"
                                                                                onclick="alert('Bạn cần đăng nhập để thêm vào giỏ hàng')">Thêm
                                                                                giỏ hàng</a>
                                                                        @endauth
                                                                    </div>
                                                                    <div class="action-link-right">
                                                                        <a href="{{ route('productsdetail', $item->id) }}"
                                                                            class="link">
                                                                            <i class="fa-regular fa-eye"></i>
                                                                        </a>
                                                                        <a href="#" class="link">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-content py-3">
                                                                <h6 class="card-text product-name">
                                                                    <a class="text-black text-decoration-none"
                                                                        href="#">{{ $item->name }}</a>
                                                                </h6>
                                                                <span class="price">
                                                                    @if (!$item->price_sale)
                                                                        {{ number_format($item->price, 0, '.', ',') }} VNĐ
                                                                    @else
                                                                        <del>{{ number_format($item->price, 0, '.', ',') }}
                                                                            VNĐ</del>
                                                                        {{ number_format($item->price_sale, 0, '.', ',') }}
                                                                        VNĐ
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev bor" type="button"
                                data-bs-target="#productCarouselSold" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next bor" type="button"
                                data-bs-target="#productCarouselSold" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    <div class="product-views my-5">
                        <div id="productCarouselView" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($products_view->chunk(4) as $chunk)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <div class="row">
                                            @foreach ($chunk as $item)
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="product-hover">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="image">
                                                                <a href="{{ route('productsdetail', $item->id) }}">
                                                                    <img src="{{ asset('uploads/products/' . $item->image) }}"
                                                                        class="card-img-top" alt="...">
                                                                </a>
                                                                <div
                                                                    class="action-link d-flex align-items-center justify-content-between">
                                                                    <div class="action-link-left">
                                                                        @auth
                                                                            <!-- Chuyển href thành form để gửi POST -->
                                                                            <form action="{{ route('cart.add', $item->id) }}"
                                                                                method="POST" class="add-to-cart-form">
                                                                                @csrf
                                                                                <input type="hidden" name="quantity"
                                                                                    value="1">
                                                                                <button type="submit" class="link">Thêm giỏ
                                                                                    hàng</button>
                                                                            </form>
                                                                        @else
                                                                            <a title="Thêm vào giỏ hàng" class="link"
                                                                                href="{{ route('login') }}"
                                                                                onclick="alert('Bạn cần đăng nhập để thêm vào giỏ hàng')">Thêm
                                                                                giỏ hàng</a>
                                                                        @endauth
                                                                    </div>
                                                                    <div class="action-link-right">
                                                                        <a href="{{ route('productsdetail', $item->id) }}"
                                                                            class="link">
                                                                            <i class="fa-regular fa-eye"></i>
                                                                        </a>
                                                                        <a href="#" class="link">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-content py-3">
                                                                <h6 class="card-text product-name">
                                                                    <a class="text-black text-decoration-none"
                                                                        href="#">{{ $item->name }}</a>
                                                                </h6>
                                                                <span class="price">
                                                                    @if (!$item->price_sale)
                                                                        {{ number_format($item->price, 0, '.', ',') }} VNĐ
                                                                    @else
                                                                        <del>{{ number_format($item->price, 0, '.', ',') }}
                                                                            VNĐ</del>
                                                                        {{ number_format($item->price_sale, 0, '.', ',') }}
                                                                        VNĐ
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev bor" type="button"
                                data-bs-target="#productCarouselView" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next bor" type="button"
                                data-bs-target="#productCarouselView" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end sản phẩm mới -->
    <!-- banner 2 -->
    <div class="banner-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="hover">
                        <div class="banner-2 pst-r ">
                            <div class="image">
                                <img class="img-fluid" src="img/banner2.jpg" alt="">
                            </div>
                            <div class="banner-2-content">
                                <h3 class="title">Nội thất hiện đại </h3>
                                <h5 class="sub-title">
                                    Chúng tôi thiết kế ngôi nhà của bạn đẹp hơn</h5>
                                <a class="btn btn-lg" href="#"><span class="d-flex align-items-center">Khám phá
                                        ngay</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner 2 -->
    <!-- product best sellers -->
    <div class="product-bestsellers">
        <div class="section-tille">
            <div class="row">
                <div class="col-12">
                    <h3>Sản Phẩm bán chạy</h3>
                    <p>Thêm sản phẩm bán chạy nhất của chúng tôi vào danh sách hàng tuần của bạn.</p>
                </div>
            </div>
        </div>
        <div class="product-bestSeller my-5">
            <div id="productCarouselSold2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($products_sold->chunk(4) as $chunk)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row">
                                @foreach ($chunk as $item)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="product-hover">
                                            <div class="card" style="width: 18rem;">
                                                <div class="image">
                                                    <a href="{{ route('productsdetail', $item->id) }}">
                                                        <img src="{{ asset('uploads/products/' . $item->image) }}"
                                                            class="card-img-top" alt="...">
                                                    </a>
                                                    <div
                                                        class="action-link d-flex align-items-center justify-content-between">
                                                        <div class="action-link-left">
                                                            @auth
                                                                <!-- Chuyển href thành form để gửi POST -->
                                                                <form action="{{ route('cart.add', $item->id) }}"
                                                                    method="POST" class="add-to-cart-form">
                                                                    @csrf
                                                                    <input type="hidden" name="quantity" value="1">
                                                                    <button type="submit" class="link">Thêm giỏ
                                                                        hàng</button>
                                                                </form>
                                                            @else
                                                                <a title="Thêm vào giỏ hàng" class="link"
                                                                    href="{{ route('login') }}"
                                                                    onclick="alert('Bạn cần đăng nhập để thêm vào giỏ hàng')">Thêm
                                                                    giỏ hàng</a>
                                                            @endauth
                                                        </div>
                                                        <div class="action-link-right">
                                                            <a href="{{ route('productsdetail', $item->id) }}"
                                                                class="link">
                                                                <i class="fa-regular fa-eye"></i>
                                                            </a>
                                                            <a href="#" class="link">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content py-3">
                                                    <h6 class="card-text product-name">
                                                        <a class="text-black text-decoration-none"
                                                            href="#">{{ $item->name }}</a>
                                                    </h6>
                                                    <span class="price">
                                                        @if (!$item->price_sale)
                                                            {{ number_format($item->price, 0, '.', ',') }} VNĐ
                                                        @else
                                                            <del>{{ number_format($item->price, 0, '.', ',') }} VNĐ</del>
                                                            {{ number_format($item->price_sale, 0, '.', ',') }} VNĐ
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev bor" type="button" data-bs-target="#productCarouselSold2"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next bor" type="button" data-bs-target="#productCarouselSold2"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
    <!-- end product best sellers -->
    <!-- banner 3 -->
    <div class="banner-section-3">
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-3">
                    <div class="hover">
                        <div class="pst-r banner-3">
                            <div class="banner-3-image">
                                <img class="img-fluid" src="img/banner-3-1.jpg" alt="">
                            </div>
                            <a class="content" href="#">
                                <div class="inner">
                                    <h4 class="title">Bar Stool</h4>
                                    <h6 class="sub-title">20 products</h6>
                                </div>
                                <span class="round-btn"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="hover">
                        <div class="pst-r banner-3">
                            <div class="banner-3-image">
                                <img class="img-fluid" src="img/banner-3-2.jpg" alt="">
                            </div>
                            <a class="content" href="#">
                                <div class="inner">
                                    <h4 class="title">Armchairs</h4>
                                    <h6 class="sub-title">20 products</h6>
                                </div>
                                <span class="round-btn"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="hover">
                        <div class="pst-r banner-3">
                            <div class="banner-3-image">
                                <img class="img-fluid" src="img/banner-3-3.jpg" alt="">
                            </div>
                            <a class="content" href="#">
                                <div class="inner">
                                    <h4 class="title">lighting</h4>
                                    <h6 class="sub-title">20 products</h6>
                                </div>
                                <span class="round-btn"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="hover">
                        <div class="pst-r banner-3">
                            <div class="banner-3-image">
                                <img class="img-fluid" src="img/banner-3-4.jpg" alt="">
                            </div>
                            <a class="content" href="#">
                                <div class="inner">
                                    <h4 class="title">Easy chairs</h4>
                                    <h6 class="sub-title">20 products</h6>
                                </div>
                                <span class="round-btn"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner 3 -->

    <div class="section-tille">
        <div class="row">
            <div class="col-12">
                <h3>BLOG MỚI NHẤT</h3>
                <p>Trình bày bài viết theo cách tốt nhất để làm nổi bật những khoảnh khắc thú vị trên blog của bạn.</p>
            </div>
        </div>
    </div>
    <!-- section blog -->
    <div class="section-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="blog-details.html">
                        <div class="card">
                            <div class="image">
                                <img src="img/blog-1.jpg" class="img-fluid card-img-top" alt="...">
                            </div>
                            <div class="blog-content">
                                <h6 class="title product-name"><a class="text-black text-decoration-none"
                                        href="">5 Ý Tưởng
                                        Nội Thất Nhỏ Cho Căn Hộ Studio</a></h6>
                                <p class="card-text"> Khám phá những cách sắp xếp và lựa chọn nội thất thông minh để tối ưu
                                    hóa không gian trong căn hộ studio nhỏ của bạn. Tận dụng mọi góc nhỏ để tạo ra một không
                                    gian sống tiện nghi và thoải mái.</p>
                            </div>
                            <div class="inner d-flex justify-content-between align-items-center mt-3">
                                <a class="read-more-btn" href="#">Đọc Thêm <span><i
                                            class="fa-solid fa-arrow-right"></i></span></a>
                                <div class="post-meta">
                                    <a href="" class="btn date">24 Apr</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="image">
                            <img src="img/blog-2.jpg" class="img-fluid card-img-top" alt="...">
                        </div>
                        <div class="blog-content">
                            <h6 class="title product-name"><a class="text-black text-decoration-none"
                                    href="">Phong Cách
                                    Nội Thất Đơn Giản: Sự Thư Thái Từ Sự Tối Giản</a></h6>
                            <p class="card-text">Khám phá vẻ đẹp của phong cách nội thất đơn giản và tối giản, tạo ra
                                không gian sống gọn gàng và thư thái. Tìm hiểu cách áp dụng nguyên lý "ít hơn là nhiều"
                                để tạo ra một không gian sống đẹp và tiện nghi.</p>
                        </div>
                        <div class="inner d-flex justify-content-between align-items-center mt-3">
                            <a class="read-more-btn" href="#">Đọc Thêm <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                            <div class="post-meta">
                                <a href="" class="btn date">24 Apr</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="image">
                            <img src="img/blog-3.jpg" class="img-fluid card-img-top" alt="...">
                        </div>
                        <div class="blog-content">
                            <h6 class="title product-name"><a class="text-black text-decoration-none" href="">Biến
                                    Phòng
                                    Ngủ Thành Khu Vườn Nhỏ Trong Nhà</a></h6>
                            <p class="card-text"> Hãy khám phá cách biến phòng ngủ của bạn thành một khu vườn nhỏ trong
                                nhà, nơi bạn có thể thư giãn và tận hưởng không gian xanh mát. Tìm hiểu về cách chọn cây
                                xanh</p>
                        </div>
                        <div class="inner d-flex justify-content-between align-items-center mt-3">
                            <a class="read-more-btn" href="#">Đọc Thêm <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                            <div class="post-meta">
                                <a href="" class="btn date">24 Apr</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section blog -->
    <!-- Instagram -->
    <div class="section-instagram">
        <div class="pst-r container">
            <div class="row g-0">
                <div class="col-lg-2">
                    <div class="hover">
                        <img class="img-fluid" src="img/instagram-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="hover">
                        <img class="img-fluid" src="img/instagram-2.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="hover">
                        <img class="img-fluid" src="img/instagram-3.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="hover">
                        <img class="img-fluid" src="img/instagram-4.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="hover">
                        <img class="img-fluid" src="img/instagram-5.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="hover">
                        <img class="img-fluid" src="img/instagram-6.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="instagram-link">
                <h5><a class="btn-instagram" href="#">instagram</a></h5>
            </div>
        </div>
    </div>
    <!-- end Instagram -->
@endsection
