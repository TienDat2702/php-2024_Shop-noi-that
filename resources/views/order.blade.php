@extends('layoutPage')
@section('title', 'Tài khoản')
@section('titlePage', 'Tài khoản')
@section('content')
    <div class="section-user">
        <div class="container">
            <div class="row row-history">
                @include('sidebar_user')
                <div class="order col-7">
                    <h3>Đơn hàng của bạn</h3>
                    @if ($auth->orders->count())
                        <div class="history_table">
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng</th>
                                            <th>Ngày</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng giá</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                       @foreach ($auth->orders as $item)
                                       @if ($item->status < 4)
                                       <tr>
                                           <td>{{ $loop->index + 1 }}</td>
                                           <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                           <td><span class="success">@if ($item->status == 0)
                                               <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"><span
                                                       class="badge text-bg-danger">Chưa xác nhận</span></a>
                                           @elseif ($item->status == 1)
                                               <span class="badge text-bg-warning">Chờ xử lý</span>
                                           @elseif ($item->status == 2)
                                               <span class="badge text-bg-primary">Đang giao hàng</span>
                                           @elseif ($item->status == 3)
                                               <span class="badge text-bg-success">Hàng đã đến</span>
                                           @elseif ($item->status == 4)
                                               <span class="badge text-bg-success">Hoàn thành</span>
                                               
                                           @endif
                                       </td>
                                           <td>{{ number_format($item->totalPrice, 0, '.', ',') }} VNĐ</td>
                                           <td>
                                               @if ($item->status == 3)
                                               <a class="btn btn-info"
                                               href="{{ route('update_status', $item->id) }}?status=4">Đã nhận hàng</a> 
                                               @else
                                               @if ($item->status == 0)
                                               <a class="view" href="{{ route('order.detail', ['user_id' => $auth->id, 'order' => $item->id]) }}" onclick="alert('xin vui lòng xác nhận đơn hàng trong email!')">view</a>
                                               @else
                                               <a class="view" href="{{ route('order.detail', ['user_id' => $auth->id, 'order' => $item->id]) }}">view</a>
                                               @endif
                                               
                                               @endif
                                              
                                           </td>
                                       </tr>
                                       @endif
                                       @endforeach
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <p>Bạn chưa đặt bất kỳ đơn đặt hàng nào</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
