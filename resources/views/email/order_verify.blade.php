<div style="boder: 3px solid green">
    <h2>Chào, {{ $order->user->first_name }}</h2>
    <h4>
        Bạn vừa có 1 đơn hàng từ shop TIENDAT, xin kiểm tra lại đơn hàng và xác nhận!
    </h4>

    <h4>Chi tiết đơn hàng của bạn, Mã đơn hàng {{$order->id}}</h4>
    <table class="table" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        <?php $tongTT=0;?>
        @foreach ($order->details as $detail)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$detail->product->name}}</td>
            <td>{{$detail->price}}</td>
            <td>{{$detail->quantity}}</td>
            <td>{{ number_format($detail->quantity * $detail->price, 0, '.', ',') }} VNĐ</td>
        </tr>
        <?php $tongTT += $detail->quantity * $detail->price?>
        @endforeach
        <tr>
            <th colspan="4">Tổng thành tiền</th>
            <td>{{ number_format($tongTT, 0, '.', ',') }} VNĐ</td>
        </tr>
    </table>
    
    <p>
        <a href="{{ route('order.verify', $token)}}">Xác nhận đơn hàng</a>
    </p>
</div>