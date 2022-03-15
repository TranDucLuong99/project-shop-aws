<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    //
    public function index(){
        return view('Frontend.products.index');
    }

    public function detail(){
        return view('Frontend.products.detail');
    }
}
