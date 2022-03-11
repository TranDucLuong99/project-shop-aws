<?php

namespace App\Http\Controllers;
use Aws\S3\S3Client;
use Aws\Credentials\Credentials;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(Request $request){
        $users = User::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return $users->isEmpty() ?
            view('Admin.users.index', compact('users', 'info')) :
            view('Admin.users.index', compact('users'));
    }

    public function getCreate(Request $request)
    {
        return view('Admin.users.create');
    }

    public function postCreate(Request $request)
    {
        $user = New User();
        $credentials = new Credentials(config('aws.root_user.key'), config('aws.root_user.secret'));
        $options = [
            'version'     => 'latest',
            'region'      => 'ap-southeast-1',
            'credentials' => $credentials
        ];
        $s3 = new S3Client($options);
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $filepath = public_path('images/user/');

        $extension = explode('.', $fileName);
        $extension = strtolower(end($extension));

        $key = md5(uniqid());
        $tmp_file_name = "{$key}.{$extension}";
        $file->move($filepath, $tmp_file_name);
        $s3->putObject([
                'Bucket' => config('aws.s3.bucket'),
                'Key'    => "User/{$fileName}",
                'Body'   => fopen(public_path() . '/images/user/' . $tmp_file_name, 'rb'),
        ]);
        $user->image    = "$tmp_file_name";
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->address  = $request->address;
        $user->role     = $request->role;
        $user->phone    = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(route('user.index'))->with('info', 'Tạo mới user thành công với id = ' . $user->id);

    }

    public function getEdit(Request $request, $id)
    {
        $user = User::find($id);
        return view('Admin.users.create', compact('user'));
    }

    public function postEdit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $credentials = new Credentials(config('aws.root_user.key'), config('aws.root_user.secret'));
        $options = [
            'version'     => 'latest',
            'region'      => 'ap-southeast-1',
            'credentials' => $credentials
        ];
        $s3 = new S3Client($options);
        if($request->file('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filepath = public_path('images/user/');

            $extension = explode('.', $fileName);
            $extension = strtolower(end($extension));

            $key = md5(uniqid());
            $tmp_file_name = "{$key}.{$extension}";
            $file->move($filepath, $tmp_file_name);
            $s3->putObject([
                    'Bucket' => config('aws.s3.bucket'),
                    'Key'    => "User/{$fileName}",
                    'Body'   => fopen(public_path() . '/images/user/' . $tmp_file_name, 'rb'),
            ]);
            $user->image    = "$tmp_file_name";
        }
        $user->name     = $request->name;
        $user->address  = $request->address;
        $user->role     = $request->role;
        $user->phone    = $request->phone;
        $user->update();
        return redirect(route('user.index'))->with('info', 'Sửa user có id = ' . $request->id . ' thành công');

    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->is_active = 0;
        $user->save();
        $user->delete();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Ẩn user có id = ' . $request->id . ' thành công');
    }

    public function restore(Request $request)
    {
        $user = User::withTrashed()->findOrFail($request->id);
        $user->is_active = 1;
        $user->save();
        $user->restore();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Hiển thị user có id = ' . $request->id . ' thành công');
    }
}
