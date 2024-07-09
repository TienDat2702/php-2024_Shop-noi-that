@extends('layoutPage')
@section('title', 'Sản phẩm')
@if (!$title)
    @section('titlePage', 'Sảm phẩm')
@else
    @section('titlePage', $title->name)
@endif
@section('content')
    <div class="section-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title"> DANH MỤC</h6>
                            {{--  --}}

                            <div class="container">
                                <div class="filter-options">
                                    <ul class="list">
                                        @foreach ($categories as $item)
                                            <li class="list-item"><a
                                                    href="{{ route('categories', $item->id) }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="show-more-container">
                                        <span class="show-more">See More</span>
                                    </div>
                                </div>
                            </div>

                            {{--  --}}

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">Tag sản phẩm</h6>
                                <div class="sidebar-content">
                                    <div class="tag-link">
                                        <a href="">Ghế</a>
                                        <a href="">Bàn</a>
                                        <a href="">Giường ngủ</a>
                                        <a href="">Bàn ăn</a>
                                        <a href="">Kệ decord</a>
                                        <a href="">Nhà bếp</a>
                                        <a href="">Trang trí</a>
                                        <a href="">Bộ ghế & bàn ăn</a>
                                        <a href="">Ghế sofa</a>
                                    </div>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-banner mt-5">
                                <div class="sidebar-content">
                                    <a class="sidebar-banner img-hover-zoom" href="#">
                                        <img class="img-fluid" src="img/side-banner-category.jpg" alt="">
                                    </a>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->

                        </div> <!-- End Sidebar Area -->
                    </div>
                </div>
                <div class="col-lg-9 pst-r">

                    @if ($products->count())

                        <div class="head-list-product d-flex justify-content-between mt-lg-3">
                            @if ($key)
                                <div class="d-flex align-items-center">
                                    <h5>Kết quả tìm kiếm : <Strong>{{ $key }}</Strong></h5>
                                </div>
                            @else
                                <div></div>
                            @endif

                            <div class="left d-flex align-items-center">
                                <span class="dropdown me-4">Sắp xếp:</span>
                                <div>
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Sắp xếp theo
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Mới Nhất</a></li>
                                        <li><a class="dropdown-item" href="#">Lượt mua nhiều nhất</a></li>
                                        <li><a class="dropdown-item" href="#">Giá từ nhỏ đến lớn</a></li>
                                        <li><a class="dropdown-item" href="#">Giá từ lớn đến nhỏ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="body-list-product mt-lg-5">
                            <div class="right">
                                <div class="row">
                                    @foreach ($products as $item)
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-hover">
                                                <div class="card" style="width: 18rem;">
                                                    <div class="image">
                                                        <a href="{{ route('productsdetail', $item->id) }}"><img
                                                                src="{{ asset('uploads/products/' . $item->image) }}"
                                                                class="card-img-top" alt="..."></a>
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
                                                                    class="link"><i class="fa-regular fa-eye"></i></a>
                                                                <a href="#" class="link"><i
                                                                        class="fa-regular fa-heart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content py-3">
                                                        <h6 class="card-text product-name"><a
                                                                class="text-black text-decoration-none"
                                                                href="#">{{ $item->name }}
                                                            </a></h6>
                                                        <span class="price">
                                                            @if (!$item->price_sale)
                                                                {{ number_format($item->price, 0, '.', ',') }} VNĐ
                                                            @else
                                                                <del> {{ number_format($item->price, 0, '.', ',') }}
                                                                    VNĐ</del>
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

                            <nav aria-label="Page navigation example">
                                <ul class="pagination d-flex justify-content-center my-3">
                                    {{ $products->appends(request()->all())->links() }}
                                </ul>
                            </nav>

                        </div>
                    @else
                        <h5 class="not-search">Không tìm thấy sản phẩm nào.</h5>
                    @endif

                </div>

            </div>
        </div>

    </div>
@endsection
