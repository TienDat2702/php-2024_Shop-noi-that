@extends('admin.layout')
@section('open', 'menu-is-opening menu-open')
@section('active', 'active')
@section('title', 'Chi tiết đơn hàng')
@section('titlepage', 'Đơn hàng')
@section('title2', 'Chi tiết đơn hàng')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                    {{-- <div class="card-header">
                        <h3 class="card-title">@yield('title2')</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <h3>Thông tin khách hàng</h3>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Tên</th>
                                            <td>
                                                <span>{{ $auth->first_name }}</span>
                                                <span>{{ $auth->last_name }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ</th>
                                            <td>{{ $auth->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $auth->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại</th>
                                            <td>{{ $auth->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ngày đặt</th>
                                            <td>{{ $auth->created_at->format('d/m/Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-md-5">
                                <h3>Thông tin giao hàng</h3>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Tên</th>
                                            <td>
                                                <span>{{ $order->first_name }}</span>
                                                <span>{{ $order->last_name }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ</th>
                                            <td>{{ $order->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại</th>
                                            <td>{{ $order->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ghi chú</th>
                                            <td>{{ $order->note ? $auth->note : 'Không có ghi chú' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                @if ($order->status == 0)
                                                    <a class="btn btn-warning">Chờ khách hàng xác nhận</a>
                                                @elseif ($order->status == 1)
                                                    <a class="btn btn-primary"
                                                        href="{{ route('orderupdate', $order->id) }}?status=2"
                                                        onclick=" return confirm('Bạn có hành động này là gì ?')">Xử
                                                        lý</a> {{-- ->2 --}}
                                                    <a class="btn btn-danger"
                                                        href="{{ route('orderupdate', $order->id) }}?status=5"
                                                        onclick=" return confirm('Bạn có hành động này là gì ?')">Hủy</a>
                                                @elseif ($order->status == 2)
                                                    <a class="btn btn-info"
                                                        href="{{ route('orderupdate', $order->id) }}?status=3"
                                                        onclick=" return confirm('Bạn có hành động này là gì ?')">Đã đến
                                                        nơi</a> {{-- -> 3  --}}
                                                @elseif ($order->status == 3)
                                                    <a class="btn btn-warning">Chờ khách hàng nhận hàng</a>
                                                @elseif ($order->status == 5)
                                                    <a class="btn btn-info"
                                                        href="{{ route('orderupdate', $order->id) }}?status=1"
                                                        onclick=" return confirm('Bạn có hành động này là gì ?')">Khôi phục</a> 
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h3 class="text-center mt-5">Sản phẩm</h3>
                        <div class="table_page table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tongTT = 0; ?>
                                    @foreach ($order->details as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td> <a href="{{ route('productsdetail', $item->product_id) }}">
                                                    <img width="50px"
                                                        src="{{ asset('uploads/products/' . $item->product->image) }}"
                                                        alt="">
                                                </a></td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ number_format($item->price, 0, '.', ',') }} VNĐ</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->price * $item->quantity, 0, '.', ',') }} VNĐ</td>
                                        </tr>
                                        <?php $tongTT += $item->price * $item->quantity; ?>
                                    @endforeach
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Tổng thành tiền</th>
                                        <td>{{ number_format($tongTT, 0, '.', ',') }} VNĐ</td>
                                    </tr>
                                </tfoot>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
