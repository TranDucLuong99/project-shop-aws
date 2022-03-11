<?php

namespace App\Http\Controllers;
use Aws\S3\S3Client;
use App\Models\Banner;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
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
        if($request->file('image')){
            $credentials = new Credentials(config('aws.root_user.key'), config('aws.root_user.secret'));
            $options = [
                'version'     => 'latest',
                'region'      => 'ap-southeast-1',
                'credentials' => $credentials
            ];
            $s3 = new S3Client($options);
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filepath = public_path('images/banner/');

            $extension = explode('.', $fileName);
            $extension = strtolower(end($extension));

            $key = md5(uniqid());
            $tmp_file_name = "{$key}.{$extension}";
            $file->move($filepath, $tmp_file_name);
            $s3->putObject([
                    'Bucket' => config('aws.s3.bucket'),
                    'Key'    => "Banner/{$fileName}",
                    'Body'   => fopen(public_path() . '/images/banner/' . $tmp_file_name, 'rb'),
            ]);
            $banner->image       = "$tmp_file_name";
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
        if($request->file('image')) {
            $credentials = new Credentials(config('aws.root_user.key'), config('aws.root_user.secret'));
            $options = [
                'version'     => 'latest',
                'region'      => 'ap-southeast-1',
                'credentials' => $credentials
            ];
            $s3 = new S3Client($options);
            $file      = $request->file('image');
            $fileName  = $file->getClientOriginalName();
            $filepath  = public_path('images/banner/');
            $extension = explode('.', $fileName);
            $extension = strtolower(end($extension));

            $key = md5(uniqid());
            $tmp_file_name = "{$key}.{$extension}";
            $file->move($filepath, $tmp_file_name);
            $s3->putObject([
                    'Bucket' => config('aws.s3.bucket'),
                    'Key'    => "Banner/{$fileName}",
                    'Body'   => fopen(public_path() . '/images/banner/' . $tmp_file_name, 'rb'),
            ]);
            $banner->image       = "$tmp_file_name";
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
