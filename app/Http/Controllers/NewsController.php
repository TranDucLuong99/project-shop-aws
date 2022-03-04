<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class NewsController extends Controller
{
    //
    public function index(Request $request){
        $news = News::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return $news->isEmpty() ?
            view('Admin.news.index', compact('news', 'info')) :
            view('Admin.news.index', compact('news'));
    }

    public function getEdit(Request $request, $id)
    {
        $category = News::find($id);
        return view('Admin.news.create', compact('category'));
    }

    public function getCreate(Request $request)
    {
        return view('Admin.news.create');
    }

    public function postCreate(Request $request)
    {
        $category              = new News();
        if($request->hasFile('image')){
            $fileName = 'images/'.$category->image;
            if(File::exists($fileName)){
                File::delete($fileName);
            }
            $image                 = $request->file('image');
            $extension             = $image->getClientOriginalExtension();
            $fileName              = time().'.'.$extension;
            $image                 = $image->move('images/category', $fileName);
            $category->image       = $fileName;
        }
        $category->name        = $request->name;
        $category->title       = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect(route('category.index'))->with('info', 'Tạo mới tin tức thành công với id = ' . $category->id);
    }

    public function postEdit(Request $request, $id)
    {
        $category = News::findOrFail($id);
        if($request->hasFile('image')){
            $fileName = 'images/'.$category->image;
            if(File::exists($fileName)){
                File::delete($fileName);
            }
            $image                 = $request->file('image');
            $extension             = $image->getClientOriginalExtension();
            $fileName              = time().'.'.$extension;
            $image                 = $image->move('images/category', $fileName);
            $category->image       = $fileName;
        }
        $category->name        = $request->name;
        $category->title       = $request->title;
        $category->description = $request->description;
        $category->update();
        return redirect(route('category.index'))->with('info', 'Sửa tin tức có id = ' . $request->id . ' thành công');

    }

    public function delete(Request $request)
    {
        $banner = News::findOrFail($request->id);
        $banner->is_active = 0;
        $banner->save();
        $banner->delete();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Ẩn tin tức có id = ' . $request->id . ' thành công');
    }

    public function restore(Request $request)
    {
        $banner = News::withTrashed()->findOrFail($request->id);
        $banner->is_active = 1;
        $banner->save();
        $banner->restore();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Hiển thị tin tức có id = ' . $request->id . ' thành công');
    }
}
