<?php

namespace App\Http\Controllers;

use App\Models\News;
use Aws\Credentials\Credentials;
use Aws\S3\S3Client;
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

    public function getCreate(Request $request)
    {
        return view('Admin.news.create');
    }

    public function postCreate(Request $request)
    {
        $new              = new News();
        $credentials = new Credentials(config('aws.root_user.key'), config('aws.root_user.secret'));
        $options = [
            'version'     => 'latest',
            'region'      => 'ap-southeast-1',
            'credentials' => $credentials
        ];
        $s3       = new S3Client($options);
        $file     = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $filepath = public_path('images/new/');

        $extension = explode('.', $fileName);
        $extension = strtolower(end($extension));

        $key = md5(uniqid());
        $tmp_file_name = "{$key}.{$extension}";
        $file->move($filepath, $tmp_file_name);
        $s3->putObject([
            'Bucket' => config('aws.s3.bucket'),
            'Key'    => "New/{$fileName}",
            'Body'   => fopen(public_path() . '/images/new/' . $tmp_file_name, 'rb'),
        ]);
        $new->image       = "$tmp_file_name";
        $new->name        = $request->name;
        $new->title       = $request->title;
        $new->description = $request->description;
        $new->save();
        return redirect(route('new.index'))->with('info', 'Tạo mới tin tức thành công với id = ' . $new->id);
    }

    public function getEdit(Request $request, $id)
    {
        $new = News::find($id);
        return view('Admin.news.create', compact('new'));
    }

    public function postEdit(Request $request, $id)
    {
        $new = News::findOrFail($id);
        $credentials = new Credentials(config('aws.root_user.key'), config('aws.root_user.secret'));
        $options = [
            'version'     => 'latest',
            'region'      => 'ap-southeast-1',
            'credentials' => $credentials
        ];
        $s3       = new S3Client($options);
        $file     = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $filepath = public_path('images/new/');

        $extension = explode('.', $fileName);
        $extension = strtolower(end($extension));

        $key = md5(uniqid());
        $tmp_file_name = "{$key}.{$extension}";
        $file->move($filepath, $tmp_file_name);
        $s3->putObject([
            'Bucket' => config('aws.s3.bucket'),
            'Key'    => "New/{$fileName}",
            'Body'   => fopen(public_path() . '/images/new/' . $tmp_file_name, 'rb'),
        ]);
        $new->image       = "$tmp_file_name";
        $new->name        = $request->name;
        $new->title       = $request->title;
        $new->description = $request->description;
        $new->update();
        return redirect(route('new.index'))->with('info', 'Sửa tin tức có id = ' . $request->id . ' thành công');

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
