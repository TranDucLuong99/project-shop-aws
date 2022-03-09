<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::with(['product', 'user'])->orderBy('updated_at', 'DESC')->get();
        return $orders->isEmpty() ?
            view('Admin.orders.index', compact('orders', 'info')) :
            view('Admin.orders.index', compact('orders'));
    }

    public function detail(Request $request, $id){
        $orders = Order::with(['product', 'user','product.category'])->findOrFail($id);
        return view('Admin.orders.detail', compact('orders'));
    }

    public function printOrder(Request $request, $id){
        $orders = Order::with(['product', 'user','product.category'])->findOrFail($id);
        return view('Admin.orders.print', compact('orders'));
    }
}
