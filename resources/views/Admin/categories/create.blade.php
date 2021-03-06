@extends('layout/admin')
@section('css')
@endsection
@section('content')
@php($url = route('category.get_create'))
@php($is_create = (\Illuminate\Support\Str::contains($url,Request::getRequestUri() )))
@php($is_category =  (isset($category)) ? true : false)
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Category</a></li>
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
                        <h5><strong>Thêm mới loại hàng</strong></h5>
                    @else
                        <h5><strong>Sửa thông tin loại hàng có id = {{$category->id}}</strong></h5>
                    @endif

                    </div>
                    <div class="card-body">
                    @if ($is_create)
                        <form action="{{ route('category.category_create') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                        @else
                        <form method="POST" role="form" enctype="multipart/form-data" accept-charset="UTF-8" action="{{route('category.get_edit', $category->id)}} ">
                        @endif
                            @csrf
                            <div class="form-group">
                                <label><strong>Tên <span style="color: red">(*)</span> </strong></label>
                                <input type="text" name="name" class="form-control" value="{{$is_create ? '' : $category->name}}" placeholder="Vui lòng nhập tên loại hàng">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{$is_create ? '' : $category->title}}" placeholder="Vui lòng nhập mô tả ngắn">
                            </div>
                            <div class="form-group">
                                <label for="image">Chọn ảnh <span style="color: red">(*)</span></label>
                                @if ($is_create)
                                <input type="file" name="image" class="form-control-file" id="image">
                                @else
                                <input type="file" name="image" class="form-control-file" id="image">
                                <img style="max-width:150px; height: 50px;" src="{{asset('images/category/'.$category->image)}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label><strong>Mô tả</strong></label>
                                <textarea name="description">{{$is_create ? '' : $category->description}}</textarea>
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
