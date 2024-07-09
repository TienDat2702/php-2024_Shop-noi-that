@extends('layoutPage')
@section('title', 'Giỏ hàng')
@section('titlePage', 'Giỏ hàng')
@section('content')
    <!-- Cart -->
    <div class="section-cart">
        @if ($carts->count())
        <div class="table-responsive">
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                            @foreach ($carts as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <a href="{{ route('productsdetail', $item->product_id) }}">
                                            <img src="{{ asset('uploads/products/' . $item->image) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('productsdetail', $item->product_id) }}">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    <td>{{ number_format($item->price, 0, '.', ',') }} VNĐ</td>
                                    
                                    <td>
                                        <input type="hidden" name="product_ids[]" value="{{ $item->product_id }}">
                                        <input name="quantities[]" min="1" max="100" value="{{ $item->quantity }}" type="number">
                                    </td>
                                    <td>{{ number_format($item->price * $item->quantity, 0, '.', ',') }} VNĐ</td>
                                    <td>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ route('cart.delete', $item->product_id) }}" class=""><i style="font-size: 20px;" class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4"><a href="{{ route('home') }}" class="btn-cart px-3 py-2">Tiếp tục mua hàng</a></th>
                            <td><button type="submit" class="btn-cart">Cập nhật</button></td>
                            <th>
                                {{ number_format($tongTT, 0, '.', ',') }} VNĐ
                            </th>
                            <th>
                                <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger">Xóa hết</a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>

            <div class="cart-bottom mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="cart-bottom-left">
                                <h3>Mã giảm giá</h3>
                                <div class="coupon_inner">
                                    <p>Nhập mã phiếu giảm giá của bạn nếu bạn có.</p>
                                    <input class="mb-2" placeholder="Má giảm giá" type="text">
                                    <a href="" class="btn-cart">ÁP DỤNG</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="cart-bottom-right">
                                <h3>Tổng kết giỏ hàng</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal d-flex justify-content-between ">
                                        <p>Tổng phụ</p>
                                        <p class="cart_amount"> {{ number_format($tongTT, 0, '.', ',') }} VNĐ</p>
                                    </div>
                                    <div class="cart_subtotal d-flex justify-content-between">
                                        <p>Phí giao hàng</p>
                                        <p class="cart_amount"><span>Phí cố định:</span> 15.000 đ</p>
                                    </div>
                                    <div class="shipping"><a href="#">Tính toán vận chuyển</a></div>

                                    <div class="cart_subtotal d-flex justify-content-between">
                                        <p>Tổng tiền</p>
                                        <p class="cart_amount"> {{ number_format($tongTT - 15000, 0, '.', ',') }} VNĐ</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="{{ route('order.checkout') }}" class="btn-cart">THANH TOÁN</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @else
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
            <div class="emptycart-content text-center">
                <div class="image">
                    <img class="img-fluid" src="img/empty-cart.png" alt="Ảnh">
                </div>
                <h4 class="title">Giỏ hàng của bạn trống</h4>
                <h6 class="sub-title">Xin lỗi... Bạn chưa thêm bất kì sản phẩm nào vào giỏ hàng!</h6>
                <a class="btn btn-lg btn-golden" href="{{ route('home') }}">Continue Shopping</a>
            </div>
        </div>
    </div>
@endif
    <!-- end cart -->

@endsection
