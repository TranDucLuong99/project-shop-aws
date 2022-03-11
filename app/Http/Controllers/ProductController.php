<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Aws\Credentials\Credentials;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    //
    public function index(Request $request){
        $products = Product::withTrashed()->with('category')->orderBy('updated_at', 'DESC')->get();
        return $products->isEmpty() ?
            view('Admin.products.index', compact('products', 'info')) :
            view('Admin.products.index', compact('products'));
    }

    public function getEdit(Request $request, $id)
    {
        $product = Product::find($id);
        $category = Category::get();
        return view('Admin.products.create', compact('product', 'category'));
    }

    public function getCreate(Request $request)
    {
        $category = Category::get();
        return view('Admin.products.create', compact('category'));
    }

    public function postCreate(Request $request)
    {
        $product              = new Product();
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
            $filepath = public_path('images/product/');

            $extension = explode('.', $fileName);
            $extension = strtolower(end($extension));

            $key = md5(uniqid());
            $tmp_file_name = "{$key}.{$extension}";
            $file->move($filepath, $tmp_file_name);
            $s3->putObject([
                'Bucket' => config('aws.s3.bucket'),
                'Key'    => "Product/{$fileName}",
                'Body'   => fopen(public_path() . '/images/product/' . $tmp_file_name, 'rb'),
            ]);
            $product->image       = "$tmp_file_name";
        }
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->category_id = $request->category_id;
        $product->new_price   = $request->new_price;
        $product->discount    = $request->discount;
        $product->discount    = $request->discount;
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->save();
        return redirect(route('product.index'))->with('info', 'Tạo mới sản phẩm thành công với id = ' . $product->id);
    }

    public function postEdit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
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
            $filepath = public_path('images/product/');

            $extension = explode('.', $fileName);
            $extension = strtolower(end($extension));

            $key = md5(uniqid());
            $tmp_file_name = "{$key}.{$extension}";
            $file->move($filepath, $tmp_file_name);
            $s3->putObject([
                'Bucket' => config('aws.s3.bucket'),
                'Key'    => "Product/{$fileName}",
                'Body'   => fopen(public_path() . '/images/product/' . $tmp_file_name, 'rb'),
            ]);
        }
        $product->image       = "$tmp_file_name";
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->category_id = $request->category_id;
        $product->new_price   = $request->new_price;
        $product->discount    = $request->discount;
        $product->discount    = $request->discount;
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->update();
        return redirect(route('product.index'))->with('info', 'Sửa thông tin sản phẩm có id = ' . $request->id . ' thành công');
    }

    public function delete(Request $request)
    {
        $banner = Product::findOrFail($request->id);
        $banner->is_active = 0;
        $banner->save();
        $banner->delete();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Ẩn sản phẩm có id = ' . $request->id . ' thành công');
    }

    public function restore(Request $request)
    {
        $banner = Product::withTrashed()->findOrFail($request->id);
        $banner->is_active = 1;
        $banner->save();
        $banner->restore();
        return redirect($request->server('HTTP_REFERER'))->with('info', 'Hiển thị sản phẩm có id = ' . $request->id . ' thành công');
    }
}
