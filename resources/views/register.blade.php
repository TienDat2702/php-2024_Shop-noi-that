@extends('layoutPage')
@section('title', 'Đăng kí')
@section('titlePage', 'Đăng kí')
@section('content')
<div class="section-login">
        <div class="container">
            <div class="row g-0">
                <div class="login-left col-6">
                    <img class="img-fluid" src="img/login.jpg" alt="">
                </div>
                <div class="login-right col-6">
                    <h3 class="text-center">ĐĂNG KÍ</h3>
                    <form action="{{ route('register') }}" method="POST" class="mb-3 row">
                        <div class="mb-3 col-6">
                            <label for="last_name" class="form-label">Họ *</label>
                            <input type="text" name="last_name" class="form-control" id="last_name">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="first_name" class="form-label">Tên *</label>
                            <input type="text" name="first_name" class="form-control" id="first_name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại *</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ </label>
                            <input type="text" name="address" class="form-control" id="address">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu *</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-login fw-bold">ĐĂNG KÍ</button>
                            <span><a href="{{ route('login') }}"><i class="fa-regular fa-pen-to-square"></i> Đăng Nhập</a></span>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
      
@endsection
