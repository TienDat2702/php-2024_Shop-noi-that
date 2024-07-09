@extends('layoutPage')
@section('title', 'Chi tiết sản phẩm')
@section('titlePage', 'Chi tiết sản phẩm')
@section('content')
    <div class="product-details-section">
        <div class="container">

            <div class="row">
                <div class="pst-r col-xl-5 col-lg-6">
                    <div class="product-image-large">
                        <img id="large-image" class="img-fluid" src="{{ asset('uploads/products/' . $product->image) }}"
                            alt="">
                    </div>
                    <div id="formList" class="product-image-thump p-4">
                        <button id="prev" class="ctrl ctrl-left"><i class="fa-solid fa-chevron-left"></i></button>
                        <div class="row-thumb">
                            @foreach ($thumbnails->where('product_id', $product->id) as $tn)
                                <div class="col-thumb item">
                                    <img class="img-fluid thumbnail" src="{{ asset($tn->path) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <button id="next" class="ctrl ctrl-right"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
                {{-- <div class="col-1 p-0"></div> --}}
            <div class="col-xl-7 col-lg-6 ps-5">
                <div class="product-details-content">
                    <div class="product-details-text">
                        <h4 class="title">{{ $product->name }}</h4>
                        <div class="d-flex align-products-center">
                            <ul class="list-unstyled details-star d-flex align-products-center">
                                <li class="t"><i class="fa-solid fa-star"></i></li>
                                <li class="t"><i class="fa-solid fa-star"></i></li>
                                <li class="t"><i class="fa-solid fa-star"></i></li>
                                <li class="t"><i class="fa-solid fa-star"></i></li>
                                <li class="f"><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <a href="#" class="customer-review ms-2 mb-3">( 245k lượt đánh giá )</a>
                        </div>
                        <div class="price">
                            @if (!$product->price_sale)
                                {{ number_format($product->price, 0, '.', ',') }} VNĐ
                            @else
                                <del> {{ number_format($product->price, 0, '.', ',') }} VNĐ</del>
                                {{ number_format($product->price_sale, 0, '.', ',') }} VNĐ
                            @endif

                        </div>
                        <p>{{ $product->content }}</p>
                    </div>
                </div>
                <div class="product-details-variable">
                    <h4 class="title">Tùy chọn có sẵn</h4>

                    <div class="variable-single-product">
                        <div class="product-stock"> <span class="product-stock-in"><i
                                    class="ion-checkmark-circled"></i></span>Trong kho: {{ $product->quantity }} (chiếc)
                        </div>
                    </div>
                    <span>Số lượng</span>
                    <div class="d-flex align-products-center mt-3">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <div class="variable-product me-3">
                                <div class="product-variable-quantity">
                                    <input name="quantity" class="form-control" min="1" max="{{ $product->quantity }}" value="1" type="number">
                                </div>
                            </div>
                            
                                @auth
                                <button type="submit" class="btn-add-to-cart">Thêm giỏ hàng</button>
                                @else   
                                <a title="Thêm vào giỏ hàng" href="{{ route('login') }}" onclick="alert('Bạn cần đăng nhập để thêm vào giỏ hàng')">Thêm giỏ hàng</a>
                                @endauth
                      
                        </form>
                    </div>

                    <div class="product-details-meta mt-lg-4">
                        <a class="icon-space-right me-lg-5" href="#"><i class="fa-regular fa-heart me-2"></i>Add to
                            wishlist</a>
                    </div>
                </div>
                <div class="product-details-catagory mb-2 d-flex">
                    <span class="title">DANH MỤC:</span>
                    <ul class="d-flex">

                        <li><a href="{{ route('categories', $category->id) }}">{{ $category->name }}</a></li>
                        {{-- <li><a href="#">KITCHEN UTENSILS</a></li>
                            <li><a href="#">TENNIS</a></li> --}}
                    </ul>
                </div>
                <div class="product-details-social d-flex">
                    <span class="title">SHARE THIS PRODUCT:</span>
                    <ul class="d-flex">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
        
    <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="decription-tab" data-bs-toggle="tab" data-bs-target="#decription-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Mô tả</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="cmt-tab" data-bs-toggle="tab" data-bs-target="#cmt-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Bình luận</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="decription-tab-pane" role="tabpanel" aria-labelledby="decription-tab" tabindex="0">Mô tả</div>
            <div class="tab-pane fade" id="cmt-tab-pane" role="tabpanel" aria-labelledby="cmt-tab" tabindex="0">Bình luận</div>
          </div>
    </div>
    </div>

    <!-- end product details -->
    <!-- sản phẩm tương tự -->
    <div class="product-bestsellers">
        <div class="section-tille">
            <div class="row">
                <div class="col-12">
                    <h3>Bạn có thể thích</h3>
                    <p>Bạn có thể lựa chọn những sản phẩm tương tự.</p>
                </div>
            </div>
        </div>
        <div class="product-bestSeller my-5">
            <div class="row">
                @foreach ($related_products as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-hover">
                            <div class="card" style="width: 18rem;">
                                <div class="image">
                                    <a href="{{ route('productsdetail', $item->id) }}"><img
                                            src="{{ asset('uploads/products/' . $item->image) }}" class="card-img-top"
                                            alt="..."></a>
                                    <div class="action-link d-flex align-items-center justify-content-between">
                                        <div class="action-link-left">
                                            <a class="link" href="#">Add to Cart</a>
                                        </div>
                                        <div class="action-link-right">
                                            <a href="{{ route('productsdetail', $item->id) }}" class="link"><i
                                                    class="fa-regular fa-eye"></i></a>
                                            <a href="#" class="link"><i class="fa-regular fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content py-3">
                                    <h6 class="card-text product-name"><a class="text-black text-decoration-none"
                                            href="#">{{ $item->name }}
                                        </a></h6>
                                    <span class="price">
                                        @if (!$item->price_sale)
                                            {{ number_format($item->price, 0, '.', ',') }} VNĐ
                                        @else
                                            <del> {{ number_format($item->price, 0, '.', ',') }} VNĐ</del>
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

    </div>
    <!-- end sản phẩm tương tự -->
@endsection
