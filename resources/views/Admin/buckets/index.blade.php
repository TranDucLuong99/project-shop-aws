@extends('layout/admin')
@section('css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css')}}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                 <div class="col-sm-6">
                        <a href="{{route('bucket.get_create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Thêm folder</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Folder</li>
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
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h3 class="card-title">Quản lý folder</h3>
                    </div>
                    <div class="col-sm-12 col-md-2"></div>
                    <div class="col-sm-12 col-md-4"></div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}} <br>
                    @endforeach
                </div>
                @endif

                @if (session('info'))
                    <div class="alert alert-success"> {{session('info')}}</div>
                @endif

                @if (isset($info))
                    <div class="alert alert-danger"> {{$info}}</div>
            @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Tên thư mục</th>
                        <th style="text-align: center">Chú thích</th>
                        <th style="text-align: center">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buckets as $id => $key)
                    <tr>
                        <td style="text-align: center">{{$id + 1}}</td>
                        <td>{{$key->name}}</td>
                        <td>{{$key->title}}</td>
                        <td style="text-align: center">
                            {{Carbon\Carbon::parse($key->updated_at)->format('Y/m/d')}}
                        </td>
                    </tr>
                    @endforeach
                  </tbody>

                  <!-- <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        @include('Admin.buckets.delete_modal')
        @include('Admin.buckets.restore_modal')
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection('content')
@push('js')
  <!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#data").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["excel", "print"]
    }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
