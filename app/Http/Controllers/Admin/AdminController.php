<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quantity = Products::all();
        $orders = Order::orderStatistical()->count();
        $revenueByMonth = OrderDetail::totalRevenueByMonth()->get();
        $orderDetails = OrderDetail::all();
        $totalRevenue = 0;
        // $orderDetails = 
        foreach ($orderDetails as $detail) {
            $itemTotal = $detail->quantity * $detail->price;

            $totalRevenue += $itemTotal;
        }
        return view('admin.index', compact('orders', 'quantity', 'totalRevenue', 'revenueByMonth'));
    }
    public function productlist()
    {
        return view('admin.productlist');
    }
    public function addproduct()
    {
        return view('admin.addproduct');
    }


    public function categorylist()
    {
        return view('admin.categorylist');
    }
    public function addcategory()
    {
        return view('admin.addcategory');
    }
}
