@extends('admin.layout')
@section('open', 'menu-is-opening menu-open')
@section('active', 'active')
@section('title', 'Danh sách đơn hàng')
@section('titlepage', 'Đơn hàng')
@section('title2', 'Danh sách đơn hàng')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <!-- Hiển thị thông báo -->
         @if (session('ok'))
         <div class="alert alert-success">
             {{ session('ok') }}
         </div>
         @elseif(session('no'))
         <div class="alert alert-danger">
          {{ session('no') }}
      </div>
        @endif
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('titlepage')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('titlepage')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('admin.alert')
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@yield('title2')</h3>
                    </div>
                    <!-- /.card-header -->
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li>
                                        <a class="nav-link active" href="{{ route('orderlist') }}?status=0">Chưa xác
                                            nhận</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('orderlist') }}?status=1">Đã xác nhận</a>
                                    </li>
                                    <li>
                                        <a class="nav-link active" href="{{ route('orderlist') }}?status=2">Đang giao
                                            hàng</a>
                                    </li>
                                    <li>
                                        <a class="nav-link active" href="{{ route('orderlist') }}?status=3">Đã đến nơi</a>
                                    </li>
                                    <li>
                                        <a class="nav-link active" href="{{ route('orderlist') }}?status=4">Hoàn tất</a>
                                    </li>
                                    <li>
                                        <a class="nav-link active" href="{{ route('orderlist') }}?status=5">Đã hủy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <tr>
                                    <th>Đơn hàng</th>
                                    <th>Ngày</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng giá</th>
                                    <th>Hành động</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td><span class="success">
                                                @if ($item->status == 0)
                                                    <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"><span
                                                            class="badge text-bg-danger">Chưa xác nhận</span></a>
                                                @elseif ($item->status == 1)
                                                    <span class="badge text-bg-success">Đã xác nhận</span>
                                                @elseif ($item->status == 2)
                                                    <span class="badge text-bg-success">Chờ xác nhận</span>
                                                @elseif ($item->status == 3)
                                                    <span class="badge text-bg-success">Đang giao hàng</span>
                                                @elseif ($item->status == 4)
                                                    <span class="badge text-bg-success">Đã hoành thành</span>
                                                @elseif ($item->status == 5)
                                                    <span class="badge text-bg-success">Đã nhận</span>
                                                @endif
                                            </span></td>
                                        <td>{{ number_format($item->totalPrice, 0, '.', ',') }} VNĐ</td>
                                        <td><a class="view"
                                                href="{{ route('orderdetail', ['order' => $item->id]) }}">view</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center my-3">
                        {{ $orders->appends(request()->all())->links() }}
                    </ul>
                </nav>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
