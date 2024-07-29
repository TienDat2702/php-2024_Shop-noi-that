<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Mail\OrderMail;
use App\Models\Cart;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $auth = auth('web')->user();
        $carts =  $auth->carts()->get();
        return view('checkout', compact('auth', 'carts'));
    }
    public function post_checkout(Request $request)
    {
        $auth = auth('web')->user();
        $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'string|min:10|max:10',
                'address' => 'string|max:255',
            ],
            [
                'phone' => 'số điện thoại không hợp lệ',
                'address' => 'Địa chỉ quá dài',
                'first_name' => 'Tên không được để trống',
                'last_name' => 'Họ không được để trống',
            ]
        );

        $data = $request->only('last_name', 'first_name', 'phone', 'email', 'address', 'note');
        $data['user_id'] = $auth->id;
        if ($order = Order::create($data)) {
            foreach ($auth->carts as $cart) {
                $token = Str::random(40);
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                ];

                OrderDetail::create($data1);
            }

            $auth->carts()->delete();

            //gửi mail
            $order->token = $token;
            $order->save();
            Mail::to($auth->email)->send(new OrderMail($order, $token));
            return redirect()->route('thank')->with('ok', 'xác nhận đơn hàng thành công');
        }
        return redirect()->route('home')->with('no', 'Không Đặt hàng thành công');
    }

    public function verify($token)
    {
        $order = Order::where('token', $token)->first();

        if ($order) {
            $order->token = null;
            $order->status = 1;
            $order->save();
            return redirect()->route('thank')->with('ok', 'xác nhận đơn hàng thành công');
        }

        return redirect()->route('home')->with('no', 'Không Đặt hàng thành công');
    }

    public function thank()
    {
        return view('thank');
    }

    public function history()
    {
        $auth = auth('web')->user();
        return view('order', compact('auth'));
    }
    public function detail($user_id, $order_id)
    {
        $auth = auth('web')->user();
        $user = User::where('id', $user_id)->first();
        // if (!$user) {
        //     abort(404);
        // }
        $order = Order::findOrFail($order_id);

        return view('orderDetail', compact('auth', 'order', 'user'));
    }

    public function update_status($order_id)
    {
        $auth = auth('web')->user();
        $order = Order::findOrFail($order_id);
        $status = request('status', 1);
        $order->update(['status' => $status]);
        if($order->status == 4){
            $auth->orders->count() - 1;
            return redirect()->route('user', $auth->id);
        }
        if($order->status == 5){
            $auth->orders->count() - 1;
            return redirect()->route('user', $auth->id);
        }
        
        return redirect()->back();
    }
}
