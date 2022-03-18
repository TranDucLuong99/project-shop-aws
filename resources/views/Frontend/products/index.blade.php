
@extends('Frontend.main.index')
@section('content')
            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Chọn sản phẩm</span>
                                <span class="d-block text-dark">yêu thích</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="products section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5">Sản phẩm mới</h2>
                        </div>
                        @foreach($products as $key)
                        @if($key->category_id == 25)
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="{{route('shop.product.detail', $key->id)}}">
                                    <img src="{{asset('images/product/'.$key->image)}}" class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert me-auto">- {{$key->discount}} $</span>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="{{route('shop.product.detail', $key->id)}}" class="product-title-link">{{$key->name}}</a>
                                        </h5>

                                        <p class="product-p">{{$key->title}}</p>
                                    </div>

                                    <div class="product-price text-muted ms-auto">
                                        <span style="text-decoration-line: line-through;">{{$key->price}} $</span> / <span style="color: red">{{$key->new_price}} $</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <div class="col-12">
                            <h2 class="mb-5">Sản phẩm phổ biến</h2>
                        </div>
                        @foreach($products as $key)
                        @if($key->category_id == 22)
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="{{route('shop.product.detail', $key->id)}}">
                                    <img src="{{asset('images/product/'.$key->image)}}" class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert me-auto">- {{$key->discount}} $</span>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="{{route('shop.product.detail', $key->id)}}" class="product-title-link">{{$key->name}}</a>
                                        </h5>

                                        <p class="product-p">{{$key->title}}</p>
                                    </div>

                                    <div class="product-price text-muted ms-auto">
                                        <span style="text-decoration-line: line-through;">{{$key->price}} $</span> / <span style="color: red">{{$key->new_price}} $</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </section>
@endsection
