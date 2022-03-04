<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return $categories->isEmpty() ?
            view('Admin.categories.index', compact('categories', 'info')) :
            view('Admin.categories.index', compact('categories'));
    }

    public function getEdit(Request $request, $id)
    {
        $category = Category::find($id);
        return view('Admin.categories.create', compact('category'));
    }

    public function getCreate(Request $request)
    {
        return view('Admin.categories.create');
    }

    public function postCreate(Request $request)
    {
        $category              = new Category();
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
        return redirect(route('category.index'))->with('info', 'Tạo category thành công với id = ' . $category->id);
    }

    public function postEdit(Request $request, $id)
    {
        $category = Category::findOrFail($id);
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
        return redirect(route('category.index'))->with('info', 'Sửa category có id = ' . $request->id . ' thành công');

    }

    public function delete(Request $request)
    {
        $banner = Category::findOrFail($request->id);
        $banner->is_active = 0;
        $banner->save();
        $banner->delete();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Ẩn category có id = ' . $request->id . ' thành công');
    }

    public function restore(Request $request)
    {
        $banner = Category::withTrashed()->findOrFail($request->id);
        $banner->is_active = 1;
        $banner->save();
        $banner->restore();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Hiển thị category có id = ' . $request->id . ' thành công');
    }
}
