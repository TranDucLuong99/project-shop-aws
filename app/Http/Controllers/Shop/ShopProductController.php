<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    //
    public function index(){
        return view('Frontend.products.index');
    }

    public function detail($id){
        $product = Product::find($id);
        $products = Product::where('id', '!=', $id)->where('category_id', $product->category_id)->get();
        return view('Frontend.products.detail', compact('product', 'products'));
    }
}
