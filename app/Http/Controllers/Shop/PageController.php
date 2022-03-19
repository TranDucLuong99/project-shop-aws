<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    //
    public function index(){
        $products = Product::withTrashed()->orderBy('updated_at', 'DESC')->get();
        $banners  = Banner::withTrashed()->get();
        return view('Frontend.homes.index', compact('products','banners'));
    }

    public function signIn(){
        return view('Frontend.main.signIn');
    }

    public function signUp(){
        return view('Frontend.main.signUp');
    }

    public function signUpUp(Request $request)
    {
        $user = New User();
        $user->email    = $request->email;
        $user->name     = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(route('shop.home.signIn'));

    }

}
