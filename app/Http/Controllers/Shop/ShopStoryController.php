<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopStoryController extends Controller
{
    //
    public function index(){
        return view('Frontend.story.index');
    }
}
