<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Thumbnails;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    function list(){    
        $key = '';
        $products = Products::paginate(9);    
        $categories = Category::all();
        $title = '';
        return view('products' , compact('products','title', 'categories', 'key'));
    }
    function detail(Request $request){
        $product = Products::where('id', $request->id)->first();
        $randView = rand(1,10000);
        $product->view += $randView;
        $product->update();
        $thumbnails = Thumbnails::all();
        $category = Category::getCategory($product->category_id)->first();
        $related_products = Products::RelatedProducts($category->id)->get();
        return view('productsdetail', compact('product', 'thumbnails', 'category', 'related_products'));
    }
    function getproductsBycategory(Request $request){
        $key = '';
        $products = Products::where('Category_id', $request->category_id)->paginate(9);
        // $page = Products::ordeBy('id', 'desc')->paginate(3);
        $categories = Category::all();
        $title = Category::Where('id', $request->category_id)->first();
        return view('products' , compact('products', 'categories', 'title', 'key'));
    }

    public function search(Request $request)
    {
        $key = $request->input('key');
        $products = Products::orderBy('id','desc')->where('name', 'LIKE', "%{$key}%")->paginate(9);
        $productsByCate = Category::where('name', $key)->first();
        $categories = Category::all();
        $title = '';
        return view('products', compact('products', 'key', 'title', 'categories'));

    }
}
