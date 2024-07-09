@extends('layoutPage')
@section('title', 'Tài khoản')
@section('titlePage', 'Tài khoản')
@section('content')
   <div class="section-user">
        <div class="container">
            <div class="row">
                @include('sidebar_user')
                <div class="order col-7">
                    <form method="POST" action="{{ route('update_user', ['id' => auth()->user()->id]) }}" class="mb-3 row">
                        @csrf
                    
                        <div class="mb-3 col-6">
                            <label for="last_name" class="form-label">Họ *</label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{$user->last_name}}"  autocomplete="family-name" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3 col-6">
                            <label for="first_name" class="form-label">Tên *</label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{$user->first_name}}"  autocomplete="given-name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}"  autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại *</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{$user->phone}}" autocomplete="tel">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{$user->address}}" autocomplete="street-address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-link btn-edit-user">SỬA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      
@endsection
