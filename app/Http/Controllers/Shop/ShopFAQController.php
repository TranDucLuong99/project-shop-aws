<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class ShopFAQController extends Controller
{
    //
    public function index(){
        $faqs = Faq::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return view('Frontend.faq.index', compact('faqs'));
    }
}
