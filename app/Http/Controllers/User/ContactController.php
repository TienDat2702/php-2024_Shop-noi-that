<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function contact(){
        return view('contact');
    }
}
