@extends('layout/admin')
@section('css')
@endsection
@section('content')
@php($url = route('banner.get_create'))
@php($is_create = (\Illuminate\Support\Str::contains($url,Request::getRequestUri() )))
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">File</a></li>
                        <li class="breadcrumb-item active">Upload</li>
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
                        <h5><strong>Upload File</strong></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                            @csrf
                            <div class="form-group">
                                <label><strong>Tên <span style="color: red">(*)</span> </strong></label>
                                <input type="text" name="name" class="form-control" value="" placeholder="Vui lòng nhập tên">
                            </div>
                            <div class="form-group">
                                <label for="file">Chọn ảnh <span style="color: red">(*)</span></label>
                                <input type="file" name="file" class="form-control-file" id="file">
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
