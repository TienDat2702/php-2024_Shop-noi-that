<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function about(){
        return view('about');
    }
}
