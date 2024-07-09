<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
// use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $tongTT = 0;
        $carts = Cart::GetProductCart(auth('web')->id())->get();

        foreach ($carts as $item) {
            $tongTT += $item->price * $item->quantity;
        }
        return view('cart', compact('tongTT'));
    }

    public function add(Products $product, Request $request)
    {
        $quantity = $request->input('quantity', 1); 
        $user_id = auth('web')->id();
        $cartExist = Cart::GetId($product->id, $user_id)->first();

        if ($cartExist) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
            Cart::GetId($product->id, $user_id)->increment('quantity', $quantity);
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
            $data = [
                'user_id' => $user_id,
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price_sale ? $product->price_sale : $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
            Cart::create($data);
        }
        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        $user_id = auth('web')->id();

        $quantities = $request->input('quantities', []);
        $product_ids = $request->input('product_ids', []);


        foreach ($product_ids as $index => $product_id) {

            $quantity = $quantities[$index];
           
            $cartItem = Cart::GetId($product_id, $user_id)->first();
            if ($cartItem) {
                Cart::GetId($product_id, $user_id)->update([
                    'quantity' => $quantity
                ]);
            }
        }
        return redirect()->route('cart.index');
    }
    public function delete($product_id)
    {
        Cart::GetId($product_id, auth('web')->id())->delete();

        return redirect()->back();
    }
    public function clear()
    {
        Cart::where('user_id', auth('web')->id())->delete();

        return redirect()->back();
    }
}
