<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['string', 'min:10', 'max:10'],
                'address' => ['string', 'max:255'],
                'password' => ['required', 'string', 'min:3', 'confirmed'],
                // 'password_confirmation' => ['required', 'confirmed'],
            ],
            [
                'confirmed'  => 'Mật khẩu không trùng khớp.',
                'phone' => 'số điện thoại không hợp lệ',
                'password' => 'Không được ít hơn 8 ký tự',
                'address' => 'Địa chỉ quá dài',
                'first_name' => 'Tên không được để trống',
                'last_name' => 'Họ không được để trống',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'last_name'  => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);
    }
    protected function registered(Request $request, $user)
    {
        $user->sendEmailVerificationNotification();
        $this->guard()->logout();
        return redirect('/login')->with('status', 'We have sent you an email verification link. Please check your email.');
    }
}
