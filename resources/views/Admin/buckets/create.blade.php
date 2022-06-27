@extends('layout/admin')
@section('css')
@endsection
@section('content')
@php($url = route('bucket.get_create'))
@php($is_create = (\Illuminate\Support\Str::contains($url,Request::getRequestUri() )))
@php($is_bucket=  (isset($bucket)) ? true : false)
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Folder</a></li>
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
                        <h5><strong>Thêm mới folder</strong></h5>
                    @else
                        <h5><strong>Sửa thông folder có id = {{$bucket->id}}</strong></h5>
                    @endif

                    </div>
                    <div class="card-body">
                    @if ($is_create)
                        <form action="{{ route('bucket.bucket_create') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                        @else
                        <form method="POST" role="form" enctype="multipart/form-data" accept-charset="UTF-8" action="{{route('bucket.get_edit', $bucket->id)}} ">
                        @endif
                            @csrf
                            <div class="form-group">
                                <label><strong>Tên folder<span style="color: red">(*)</span> </strong></label>
                                <input type="text" name="name" class="form-control" value="{{$is_create ? '' : $bucket->name}}" placeholder="Vui lòng nhập tên">
                            </div>

                            <div class="form-group">
                                <label><strong>Chú thích<span style="color: red">(*)</span> </strong></label>
                                <textarea name="title" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$is_create ? '' : $bucket->title}}</textarea>
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
<!-- <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script> -->
@endpush
