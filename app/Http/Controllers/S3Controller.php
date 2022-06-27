<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use Aws\Credentials\Credentials;
use Aws\S3\S3Client;
use Illuminate\Http\Request;

class S3Controller extends Controller
{
    //
    public function index(Request $request){
        $buckets = Bucket::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return $buckets->isEmpty() ?
            view('Admin.buckets.index', compact('buckets', 'info')) :
            view('Admin.buckets.index', compact('buckets'));
    }

    public function getCreate(Request $request)
    {
        return view('Admin.buckets.create');
    }

    // public function postCreate(Request $request)
    // {
    //     $bucket = New Bucket();
    //     $credentials = new Credentials(config('aws.root_user.key'), config('aws.root_user.secret'));
    //     $options = [
    //         'version'     => 'latest',
    //         'region'      => 'ap-southeast-1',
    //         'credentials' => $credentials
    //     ];
    //     $s3 = new S3Client($options);
    //     dd($s3);
    //     $result = $s3->createBucket([
    //         'ACL' => 'private',
    //         'Bucket' => $request->name,
    //         'CreateBucketConfiguration' => [
    //             'LocationConstraint' => 'ap-southeast-1',
    //         ],
    //         'ObjectOwnership' => 'BucketOwnerPreferred'
    //     ]);
    //     dd($result);
    //     $bucket->name        = $request->name;
    //     $bucket->title       = $request->title;
    //     $bucket->save();
    //     return redirect(route('bucket.index'))->with('info', 'Tạo mới bucket thành công với id = ' . $bucket->id);

    // }

    public function postCreate(Request $request)
    {
        $bucket = New Bucket();
        $credentials = new Credentials(config('aws.s3.key'), config('aws.s3.secret'));

        $options = [
            'version'     => 'latest',
            'region'      => 'ap-southeast-1',
            'credentials' => $credentials
        ];
        $s3 = new S3Client($options);
        $s3->putObject(array(
            'Bucket' => config('aws.s3.bucket'),
            'Key'    => "{$request->name}/",
            'Body'   => "",
            'ACL'    => 'private'
        ));
        $bucket->name        = $request->name;
        $bucket->title       = $request->title;
        $bucket->save();
        return redirect(route('bucket.index'))->with('info', 'Tạo mới thư mục thành công');
    }

}
