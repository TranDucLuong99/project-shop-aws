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
                        <a href="{{route('order.export')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Xuất excel</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                        <h3 class="card-title">Quản lý order</h3>
                    </div>
                    <div class="col-sm-12 col-md-2"></div>
                    <div class="col-sm-12 col-md-4"></div>
                </div>
            </div>

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}} <br>
                    @endforeach
                </div>
                @endif

                @if(session('info'))
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
                        <th style="text-align: center">STT</th>
                        <th style="text-align: center">Tên khách hàng</th>
                        <th style="text-align: center">Số điện thoại</th>
                        <th style="text-align: center">Giá trị đơn hàng</th>
                        <th style="text-align: center">Ghi chú</th>
                        <th style="text-align: center">Hình thức thanh toán</th>
                        <th style="text-align: center">Ngày tạo đơn</th>
                        <th style="text-align: center">Chi tiết đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $id => $key)
                    <tr>
                        <td style="text-align: center">{{$id + 1}}</td>
                        <td style="text-align: center">{{$key->fullname}}</td>
                        <td style="text-align: center">{{$key->phone}}</td>
                        <td style="text-align: center">{{$key->price_total}}</td>
                        <td style="text-align: center">{{$key->note}}</td>
                        <td style="text-align: center">
                        {!!($key->payment_status == 1) ?
                            '<span class="badge bg-info text-dark">Thanh toán khi nhận hàng</span>':
                            '<span class="badge  badge-success">Thanh Toán online</span>'
                        !!}
                        </td>
                        <td style="text-align: center">
                            {{Carbon\Carbon::parse($key->updated_at)->format('Y/m/d')}}
                        </td>

                        <td style="text-align: center">
                            <a href="{{route('order.detail',$key->id)}}" class="btn btn-default">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
  <!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script>
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
