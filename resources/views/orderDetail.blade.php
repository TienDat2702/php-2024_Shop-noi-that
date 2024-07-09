@extends('layoutPage')
@section('title', 'Chi tiết đơn hàng')
@section('titlePage', 'Chi tiết đơn hàng')
@section('content')
    <div class="section-user">
        <div class="container">
            <div class="row row-history">
                @include('sidebar_user')
                <div class="order col-7">
                    <div class="row row-detail">
                        <div class="col-md-12">
                            <div class="order_table">
                                <div class="table_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th colspan="2">Thông tin giao hàng</th>
                                            </tr>
                                        </thead>
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
                                                <th>Ngày đặt</th>
                                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ghi chú</th>
                                                <td>{{ $order->note ? $order->note : 'Không có ghi chú' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <td colspan="5">Tổng thành tiền</td>
                                    <td>{{ number_format($tongTT, 0, '.', ',') }} VNĐ</td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                    @if ($order->status == 0 || $order->status == 1)
                    <a class="btn btn-danger" href="{{ route('update_status', $order->id) }}?status=5"
                        onclick=" return confirm('Bạn có hành động này là gì ?')">Hủy</a>
                    @endif
                    
                </div>

            </div>


        </div>
    </div>

@endsection
