<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    function index()
    {
        $products_new = Products::GetProductNew()->get();
        $products_sold = Products::GetProductSold()->get();
        $products_view = Products::GetProductView()->get();
        $categoryHot = Category::GetCategoryHot()->first();
        $categoriesHot = Category::getCategoryHot()->offset(1)->limit(4)->get();
        $user = User::all();
        return view('home', compact('products_new', 'products_sold', 'products_view', 'categoryHot', 'categoriesHot', 'user'));
    }
}
