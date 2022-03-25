<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index(Request $request){
        $faqs = Faq::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return $faqs->isEmpty() ?
            view('Admin.faqs.index', compact('faqs', 'info')) :
            view('Admin.faqs.index', compact('faqs'));
    }

    public function getCreate(Request $request)
    {
        return view('Admin.faqs.create');
    }

    public function postCreate(Request $request)
    {
        $faq = New Faq();
        $faq->name        = $request->name;
        $faq->type        = $request->type;
        $faq->description = $request->description;
        $faq->save();
        return redirect(route('faq.index'))->with('info', 'Tạo mới faq thành công với id = ' . $faq->id);

    }

    public function getEdit(Request $request, $id)
    {
        $faq = Faq::find($id);
        return view('Admin.faqs.create', compact('faq'));
    }

    public function postEdit(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->name        = $request->name;
        $faq->type        = $request->type;
        $faq->description = $request->description;
        $faq->update();
        return redirect(route('faq.index'))->with('info', 'Sửa faq có id = ' . $request->id . ' thành công');
    }

    public function delete(Request $request)
    {
        $faq = Faq::findOrFail($request->id);
        $faq->is_active = 0;
        $faq->save();
        $faq->delete();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Ẩn faq có id = ' . $request->id . ' thành công');
    }

    public function restore(Request $request)
    {
        $faq = Faq::withTrashed()->findOrFail($request->id);
        $faq->is_active = 1;
        $faq->save();
        $faq->restore();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Hiển thị faq có id = ' . $request->id . ' thành công');
    }
}
