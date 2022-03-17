<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index(){
        $products = Product::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return view('Frontend.homes.index', compact('products'));
    }

    public function signIn(){
        return view('Frontend.main.signIn');
    }

    public function signUp(){
        return view('Frontend.main.signUp');
    }

}
