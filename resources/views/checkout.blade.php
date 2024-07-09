@extends('layoutPage')
@section('title', 'Thanh toán')
@section('titlePage', 'Thanh toán')
@section('content')
<div class="checkout-section">
    <div class="container">
        <div class="row">
        </div>
        <!-- Start User Details Checkout Form -->
        <div class="checkout_form aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <!-- Đặt URL action cho form -->
                    <form action="{{ route('order.post_checkout') }}" method="POST">
                        @csrf
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>Họ <span>*</span></label>
                                    <input name="last_name" type="text" value="{{ old('last_name', $auth->last_name) }}" >
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>Tên <span>*</span></label>
                                    <!-- Sử dụng old() để giữ lại giá trị cũ -->
                                    <input name="first_name" type="text" value="{{ old('first_name', $auth->first_name) }}" >
                                    <!-- Hiển thị lỗi nếu có -->
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label>Địa chỉ <span>*</span></label>
                                    <input name="address" value="{{ old('address', $auth->address) }}" placeholder="Địa chỉ giao hàng" type="text">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>Phone<span>*</span></label>
                                    <input name="phone" value="{{ old('phone', $auth->phone) }}" type="text">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label> Email <span>*</span></label>
                                    <input name="email" type="text" value="{{ old('email', $auth->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="order-notes">
                                    <label for="order_note">Ghi chú</label>
                                    <textarea name="note" id="order_note" placeholder="Ghi chú đơn hàng">{{ old('note') }}</textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tongTT=0;?>
                                    @foreach ($carts as $cart)
                                    <tr>
                                        <td> <img width="80px" class="me-3" src="{{ asset('uploads/products/' . $cart->image) }}" alt=""> {{$cart->name}} <strong> × {{$cart->quantity}}</strong></td>
                                        <td>{{ number_format($cart->price, 0, '.', ',') }} VNĐ</td>
                                        <td>{{ number_format($cart->price * $cart->quantity, 0, '.', ',') }} VNĐ</td>
                                    </tr>
                                    <?php $tongTT += $cart->price * $cart->quantity;?>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    {{-- <tr>
                                        <th>Tổng phụ</th>
                                        <td>$215.00</td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <th>Phí giao hàng cố định</th>
                                        <td><strong>$5.00</strong></td>
                                    </tr> --}}
                                    <tr class="order_total">
                                        <th colspan="2">Tổng thành tiền </th>
                                        <td><strong>{{ number_format($tongTT, 0, '.', ',') }} VNĐ</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <label class="checkbox-default collapsed" for="currencyCod" data-bs-toggle="collapse" data-bs-target="#methodCod" aria-expanded="false">
                                    <input type="checkbox" id="currencyCod">
                                    <span>Cash on Delivery</span>
                                </label>

                                <div id="methodCod" class="collapse" data-parent="#methodCod" style="">
                                    <div class="card-body1">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                            / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-default">
                                <label class="checkbox-default collapsed" for="currencyPaypal" data-bs-toggle="collapse" data-bs-target="#methodPaypal" aria-expanded="false">
                                    <input type="checkbox" id="currencyPaypal">
                                    <span>PayPal</span>
                                </label>
                                <div id="methodPaypal" class="collapse" data-parent="#methodPaypal" style="">
                                    <div class="card-body1">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                            PayPal account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_button pt-3">
                                <button class="btn btn-md btn-black-default-hover" type="submit">
                                    Đặt hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- Start User Details Checkout Form -->
    </div>
</div>
@endsection
