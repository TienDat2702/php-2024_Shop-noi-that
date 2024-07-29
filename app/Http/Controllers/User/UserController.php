<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Favorite;

class UserController extends Controller
{
    function index(Request $request)
    {
        // $user = User::find($request->id);
        $auth = auth('web')->user();
        $user = User::where('id', $request->id)->first();
        if (!$user) {
            abort(404);
        }
        return view('order', compact('user', 'auth'));
    }
    function orderDetail(Request $request)
    {
        // $user = User::find($request->id);
        $auth = auth('web')->user();
        $user = User::where('id', $request->id)->first();
        if (!$user) {
            abort(404);
        }
        return view('orderDetail', compact('user', 'auth'));
    }
    function edit(Request $request){
        $user = User::where('id', $request->id)->first();
        if (!$user) {
            abort(404);
        }
        return view('edituser', compact('user'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['string', 'min:10' , 'max:10'],
            'address' => ['string', 'max:255'],
        ],
        [
            'confirmed'  => 'Mật khẩu không trùng khớp.',
            'phone' => 'số điện thoại không hợp lệ',
            'address' => 'Địa chỉ quá dài',
            'first_name' => 'Tên không được để trống',
            'last_name' => 'Họ không được để trống',
        ]
    );
    }
    protected function update(Request $request, $id)
    {
        // Gọi hàm validator để xác thực dữ liệu đầu vào
        $validator = $this->validator($request->all(), $id);

        // Kiểm tra xem dữ liệu có hợp lệ không
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $user->update([
            'last_name'  => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect( route('user', ['id'=>$id]));
    }
    
}
