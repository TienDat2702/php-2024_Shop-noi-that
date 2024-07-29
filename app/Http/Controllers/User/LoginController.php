<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(){
        return view('login');
    }
    function register(){
        return view('register');
    }
}
