<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class BannerController extends Controller
{
    //
    public function index(Request $request){
        $banners = Banner::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return $banners->isEmpty() ?
            view('Admin.banners.index', compact('banners', 'info')) :
            view('Admin.banners.index', compact('banners'));
    }

    public function getCreate(Request $request)
    {
        return view('Admin.banners.create');
    }

    public function postCreate(Request $request)
    {
        $banner = New Banner();
        if($request->hasFile('image')){
            $fileName = 'images/'.$banner->image;
            if(File::exists($fileName)){
                File::delete($fileName);
            }
            $image                 = $request->file('image');
            $extension             = $image->getClientOriginalExtension();
            $fileName              = time().'.'.$extension;
            $image                 = $image->move('images/banner', $fileName);
            $banner->image       = $fileName;
        }
        $banner->name        = $request->name;
        $banner->title       = $request->title;
        $banner->description = $request->description;
        $banner->save();
        return redirect(route('banner.index'))->with('info', 'Tạo mới banner thành công với id = ' . $banner->id);
    }

    public function getEdit(Request $request, $id)
    {
        $banner = Banner::find($id);
        return view('Admin.banners.create', compact('banner'));
    }

    public function postEdit(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        if($request->hasFile('image')){
            $fileName = 'images/'.$banner->image;
            if(File::exists($fileName)){
                File::delete($fileName);
            }
            $image                 = $request->file('image');
            $extension             = $image->getClientOriginalExtension();
            $fileName              = time().'.'.$extension;
            $image                 = $image->move('images/banner', $fileName);
            $banner->image       = $fileName;
        }
        $banner->name        = $request->name;
        $banner->title       = $request->title;
        $banner->description = $request->description;
        $banner->update();
        return redirect(route('banner.index'))->with('info', 'Sửa banner có id = ' . $request->id . ' thành công');

    }

    public function delete(Request $request)
    {
        $banner = Banner::findOrFail($request->id);
        $banner->is_active = 0;
        $banner->save();
        $banner->delete();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Ẩn banner có id = ' . $request->id . ' thành công');
    }

    public function restore(Request $request)
    {
        $banner = Banner::withTrashed()->findOrFail($request->id);
        $banner->is_active = 1;
        $banner->save();
        $banner->restore();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Hiển thị banner có id = ' . $request->id . ' thành công');
    }
}
