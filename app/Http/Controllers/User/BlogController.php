<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function blog(){
        return view('blog');
    }
}
