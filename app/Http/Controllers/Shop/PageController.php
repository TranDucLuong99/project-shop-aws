<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index(){
        return view('Frontend.homes.index');
    }

    public function signIn(){
        return view('Frontend.main.signIn');
    }

    public function signUp(){
        return view('Frontend.main.signUp');
    }

}
