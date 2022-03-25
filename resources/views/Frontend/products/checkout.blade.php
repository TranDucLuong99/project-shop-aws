@extends('Frontend.main.index')
@section('content')
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post"
                action="{{ route('saveCart')}}">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">
                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">2</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @if(Session::has('Cart') != null)
                                @foreach(Session::get('Cart')->products as $item)
                                <input type="hidden" name="productId" value="{{$item['productInfo']->id}}">
                                <input type="hidden" name="productQuantity" value="{{$item['quantity']}}">

                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{$item['productInfo']->name}}</h6>
                                        <small class="text-muted">{{$item['productInfo']->new_price}}$ x {{$item['quantity']}}</small>
                                    </div>
                                    <span class="text-muted">{{$item['price']}}$</span>
                                </li>
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Tổng số lượng</span>
                                    <strong> {{Session::get('Cart')->totalQuantity}}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Phí ship</span>
                                    <strong>5$</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Tổng thành tiền</span>
                                    <strong> {{Session::get('Cart')->totalPrice + 5}}$</strong>
                                    <input type="hidden" name="price_total" value="{{Session::get('Cart')->totalPrice + 5}}">
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control" name="fullname" id="kh_ten"
                                    value="">
                            </div>

                            <div class="col-md-12">
                                <label for="kh_diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="kh_diachi"
                                    value="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="kh_dienthoai"
                                    value="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="email" id="kh_email"
                                    value="tranducluong8899@gmail.com" readonly="">
                            </div>

                            <div class="col-md-12">
                                <label for="">Note</label>
                                <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                        </div>

                        <h4 class="mb-3">Hình thức thanh toán</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="payment_status" type="radio" class="custom-control-input" required=""
                                    value="2">
                                <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-3" name="payment_status" type="radio" class="custom-control-input" required=""
                                    value="1">
                                <label class="custom-control-label" for="httt-3">Ship COD</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang" style="margin-bottom: 32px">Đặt
                            hàng</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End block content -->
    <!-- </main> -->


    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../assets/js/app.js"></script>
    @endsection
