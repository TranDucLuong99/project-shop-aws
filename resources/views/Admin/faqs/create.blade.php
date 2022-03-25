@extends('layout/admin')
@section('css')
@endsection
@section('content')
@php($url = route('faq.get_create'))
@php($is_create = (\Illuminate\Support\Str::contains($url,Request::getRequestUri() )))
@php($is_faq=  (isset($faq)) ? true : false)
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">FAQ</a></li>
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
                        <h5><strong>Thêm mới faq</strong></h5>
                    @else
                        <h5><strong>Sửa thông faq có id = {{$faq->id}}</strong></h5>
                    @endif

                    </div>
                    <div class="card-body">
                    @if ($is_create)
                        <form action="{{ route('faq.faq_create') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                        @else
                        <form method="POST" role="form" enctype="multipart/form-data" accept-charset="UTF-8" action="{{route('faq.get_edit', $faq->id)}} ">
                        @endif
                            @csrf
                            <div class="form-group">
                                <label><strong>Câu hỏi<span style="color: red">(*)</span> </strong></label>
                                <input type="text" name="name" class="form-control" value="{{$is_create ? '' : $faq->name}}" placeholder="Vui lòng nhập tên">
                            </div>
                            <div class="form-group">
                                <label for="type">Loại FAQ<span style="color: red">(*)</span></label>
                                <select  name = "type" class="form-control" id="type">
                                    @if ($is_create)
                                        <option value="1">Thông tin chung</option>
                                        <option value="2">Sản phẩm</option>
                                    @else
                                        <option value="1" {{$faq->type == 1 ? 'selected' : '' }}>Thông tin chung</option>
                                        <option value="2" {{$faq->type == 2 ? 'selected' : '' }}>Sản phẩm</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label><strong>Câu trả lời<span style="color: red">(*)</span> </strong></label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$is_create ? '' : $faq->description}}</textarea>
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
