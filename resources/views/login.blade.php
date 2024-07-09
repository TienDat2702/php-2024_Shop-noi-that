@extends('layoutPage')
@section('title', 'Đăng nhập')
@section('titlePage', 'Đăng nhập')
@section('content')
   <!-- login -->
   <div class="section-login">
        <div class="container">
            <div class="row g-0">
                <div class="login-left col-6">
                    <img class="img-fluid" src="img/login.jpg" alt="">
                </div>
                <div class="login-right col-6">
                    <h3 class="text-center">ĐĂNG NHẬP</h3>
                    <form class="mb-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address *</label>
                            <input type="email" class="form-control" id="email"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input check-login" id="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ mật khẩu</label>
                        </div>
                        <button type="submit" class="btn btn-login fw-bold">ĐĂNG NHẬP</button>
                    </form>
                    <div class="login-right-bot d-flex justify-content-between align-items-center">
                        <a class="" href="">Quên Mật khẩu</a>
                        <span><a href="{{ route('register') }}"><i class="fa-regular fa-pen-to-square"></i> Đăng kí tài khoản</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
      
@endsection
