<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function AddCart(Request $req, $id){
        $products = Product::find($id);
        if($products != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($products, $id);
            $req->session()->put('Cart', $newCart);
        }
        return view('Frontend.main.quantity', compact('newCart'));
    }

    public function saveCart(Request $req){
        if($req->session()->has('Cart')){
            $order = new Order();
            $order->user_id         = Auth::user()->id;
            $order->fullname       = $req->fullname;
            $order->address        = $req->address;
            $order->phone          = $req->phone;
            $order->email          = $req->email;
            $order->note           = $req->note;
            $order->price_total    = $req->price_total;
            $order->payment_status = $req->payment_status;
            $order->save();

            foreach ($req->session()->get('Cart')->products as $item){
               $order_detail = new OrderDetail();
               $order_detail->order_id = $order->id;
               $order_detail->product_id = $item['productInfo']->id;
               $order_detail->quantity = $item['quantity'];
               $order_detail->save();
            }
        }
        session()->forget('Cart');

        return view('Frontend.main.checkout');
    }
}
