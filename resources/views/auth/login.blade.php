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
                    <form method="POST" action="{{ route('login') }}" class="mb-3">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address *</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Ghi nhớ mật khẩu</label>
                        </div>

                        <button type="submit" class="btn btn-login fw-bold">ĐĂNG NHẬP</button>
                        {{-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif --}}
                    </form>
                    <div class="login-right-bot d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Quên mật khẩu?
                        </a>
                        @endif
                        <span><a href="{{ route('register') }}"><i class="fa-regular fa-pen-to-square"></i> Đăng kí tài khoản</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
      
@endsection