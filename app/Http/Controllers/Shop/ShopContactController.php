<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopContactController extends Controller
{
    //
    public function index(){
        return view('Frontend.contact.index');
    }
}
