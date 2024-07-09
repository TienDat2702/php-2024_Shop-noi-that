<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $status = request('status', 1);
        $orders = Order::orderBy('id', 'DESC')->where('status', $status)->paginate(6);
        // dd($orders);
        return view('admin.order.orderlist', compact('orders'));
    }

    public function detail($order_id) {
        $order = Order::findOrFail($order_id);
        $auth = $order->user;
    
        return view('admin.order.orderdetail', compact('auth', 'order',));
    }
    public function update($order_id) {
        $order = Order::findOrFail($order_id);
        $status = request('status', 1);
        if($order->status != 3){
            $order->update(['status' => $status]);
            return redirect()->route('orderlist')->with('ok', 'Cập nhật trạng thái thành công');
        }
        return redirect()->route('orderlist')->with('no', 'Đơn hàng đã giao không thể cập nhật');
    }
}
