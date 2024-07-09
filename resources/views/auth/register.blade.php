@extends('layoutPage')
@section('title', 'Đăng ký')
@section('titlePage', 'Đăng ký')
@section('content')
<div class="section-login">
        <div class="container">
            <div class="row g-0">
                <div class="login-left col-6">
                    <img class="img-fluid" src="img/login.jpg" alt="">
                </div>
                <div class="login-right col-6">
                    <h3 class="text-center">ĐĂNG KÍ</h3>
                    <form method="POST" action="{{ route('register') }}" class="mb-3 row">
                        @csrf
                    
                        <div class="mb-3 col-6">
                            <label for="last_name" class="form-label">Họ *</label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name') }}"  autocomplete="family-name" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3 col-6">
                            <label for="first_name" class="form-label">Tên *</label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name') }}"  autocomplete="given-name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}"  autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại *</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}" autocomplete="tel">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address') }}" autocomplete="street-address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu *</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Nhập lại mật khẩu</label>
                            <input id="password-confirm" type="password" class="form-control"  name="password_confirmation"  required autocomplete="new-password">
                            {{-- @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        </div>
                    
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-login fw-bold">ĐĂNG KÍ</button>
                            <span><a href="{{ route('login') }}"><i class="fa-regular fa-pen-to-square"></i> Đăng Nhập</a></span>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
      
@endsection