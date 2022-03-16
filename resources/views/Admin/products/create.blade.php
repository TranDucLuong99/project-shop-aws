@extends('layout/admin')
@section('css')
@endsection
@section('content')
@php($url = route('product.get_create'))
@php($is_create = (\Illuminate\Support\Str::contains($url,Request::getRequestUri() )))
@php($is_product =  (isset($product)) ? true : false)
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Product</a></li>
                        @if ($is_create)
                        <li class="breadcrumb-item active">Thêm mới</li>
                        @else
                        <li class="breadcrumb-item active">Sửa</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
                    <div class="card-header">
                    @if ($is_create)
                        <h5><strong>Thêm mới sản phẩm</strong></h5>
                    @else
                        <h5><strong>Sửa thông tin sản phẩm có id = {{$product->id}}</strong></h5>
                    @endif

                    </div>
                    <div class="card-body">
                    @if ($is_create)
                        <form action="{{ route('product.product_create') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                        @else
                        <form method="POST" role="form" enctype="multipart/form-data" accept-charset="UTF-8" action="{{route('product.get_edit', $product->id)}} ">
                        @endif
                            @csrf
                            <div class="form-group">
                                <label><strong>Tên <span style="color: red">(*)</span> </strong></label>
                                <input type="text" name="name" class="form-control" value="{{$is_create ? '' : $product->name}}" placeholder="Vui lòng nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Loại sản phẩm <span style="color: red">(*)</span></label>
                                <select  name = "category_id" class="form-control" id="category_id">
                                @foreach($category as $key)
                                    @if ($is_create)
                                        <option value="{{$key->id}}">{{ $key->name }}</option>
                                    @else
                                        <option value="{{$key->id}}" {{$key->id == $product->category_id ? 'selected' : '' }}>{{ $key->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="new_price">Giá gốc <span style="color: red">(*)</span></label>
                                    <input type="number" class="form-control" placeholder="Giá gốc" name="price" value="{{$is_create ? '' : $product->price}}">
                                </div>
                                <div class="col">
                                    <label for="new_price">Giá mới <span style="color: red">(*)</span></label>
                                    <input type="number" class="form-control" placeholder="Giá mới" name="new_price" value="{{$is_create ? '' : $product->new_price}}">
                                </div>
                                <div class="col">
                                    <label for="discount">Giảm giá</label>
                                    <input type="number" class="form-control" placeholder="Giảm giá" name="discount" value="{{$is_create ? '' : $product->discount}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{$is_create ? '' : $product->title}}" placeholder="Vui lòng nhập mô tả ngắn">
                            </div>
                            <div class="form-group">
                                <label for="image">Chọn ảnh <span style="color: red">(*)</span></label>
                                @if ($is_create)
                                <input type="file" name="image" class="form-control-file" id="image">
                                @else
                                <input type="file" name="image" class="form-control-file" id="image">
                                <img style="max-width:150px; height: 50px;" src="{{asset('images/product/'.$key->image)}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label><strong>Mô tả sản phẩm</strong></label>
                                <textarea name="description">{{$is_create ? '' : $product->description}}</textarea>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-success" name="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection('content')
@push('js')
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endpush
