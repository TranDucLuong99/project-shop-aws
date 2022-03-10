@extends('layout/admin')
@section('css')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                    <a target="_blank" href="{{route('order.print',$orders->id)}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> In hóa đơn</a>
              </div>
              <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Ghi chú</th>
                                <th scope="col">Hình thức thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$orders->id}}</td>
                                <td>{{$orders->fullname}}</td>
                                <td>{{$orders->address}}</td>
                                <td>{{$orders->phone}}</td>
                                <td>{{$orders->email}}</td>
                                <td>{{$orders->price_total}}</td>
                                <td>{{$orders->note}}</td>
                                <td style="text-align: center">
                                    {!!($orders->payment_status == 1) ?
                                        '<span class="badge bg-info text-dark">Thanh toán khi nhận hàng</span>':
                                        '<span class="badge  badge-success">Thanh Toán online</span>'
                                    !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
              </div>

              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sản Phẩm</h3>
              </div>
              <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">STT</th>
                                <th scope="col" style="text-align: center">Mã sản phẩm</th>
                                <th scope="col" style="text-align: center">Tên sản phẩm</th>
                                <th scope="col" style="text-align: center">Loại sản phẩm</th>
                                <th scope="col" style="text-align: center">Ảnh sản phẩm</th>
                                <th scope="col" style="text-align: center">Số lượng </th>
                                <th scope="col" style="text-align: center">Đơn giá </th>
                                <th scope="col" style="text-align: center">Giảm giá </th>
                                <th scope="col" style="text-align: center">Thành tiền </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders->product as $id => $products)
                            <tr>
                                <td style="text-align: center">{{$id + 1}}</td>
                                <td style="text-align: center">LLSSP{{$products->id}}</td>
                                <td style="text-align: center">{{$products->name}}</td>
                                <td style="text-align: center">{{$products->category->name}}</td>
                                <td style="text-align: center">
                                    @if($products->image)
                                        <img style="max-width:150px; height: 50px;" src="{{asset('images/product/'.$products->image)}}">
                                    @endif
                                </td>
                                <td style="text-align: center">{{$products->pivot->quantity}}</td>
                                <td style="text-align: center">{{$products->new_price}}</td>
                                <td style="text-align: center">{{$products->discount * $products->pivot->quantity}}</td>
                                <td style="text-align: center">{{$products->new_price * $products->pivot->quantity - $products->discount}} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@endsection('content')
@push('js')
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endpush
