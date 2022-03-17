
@extends('Frontend.main.index')
@section('content')
            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">We provide you</span>
                                <span class="d-block text-dark">Fashionable Stuffs</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <img src="{{asset('images/product/'.$product->image)}}" class="img-fluid product-image" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0">{{$product->name}}</h2>

                                    <p class="product-p">{{$product->title}}</p>
                                </div>

                                <small class="product-price text-muted ms-auto mt-auto mb-5">$25</small>
                            </div>

                            <div class="product-description">

                                <strong class="d-block mt-4 mb-2">Mô tả</strong>

                                <p class="lead mb-5">{{$product->description}}</p>
                            </div>

                            <div class="product-cart-thumb row">
                                <div class="col-lg-6 col-12">

                                    <select class="form-select cart-form-select" id="inputGroupSelect01" name="quantity">
                                        <option selected>Quantity</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                    <button type="submit" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="#cart-modal">Add to Cart</button>
                                </div>

                                <p>
                                    <a href="#" class="product-additional-link">Details</a>

                                    <a href="#" class="product-additional-link">Delivery and Payment</a>
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

            <section class="related-product section-padding border-top">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h3 class="mb-5">Có thể bạn sẽ thích</h3>
                        </div>

                        @foreach($products as $key)
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="{{ route('shop.product.detail', $key->id)  }}">
                                    <img src="{{asset('images/product/'.$key->image)}}" class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert me-auto">- {{$key->discount}} Vnđ</span>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="{{route('shop.product.detail', $key->id)}}" class="product-title-link">{{$key->name}}</a>
                                        </h5>

                                        <p class="product-p">{{$key->title}}</p>
                                    </div>

                                    <span style="text-decoration-line: line-through;">{{$key->price}} Vnđ</span> / <span style="color: red">{{$key->new_price}} Vnđ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
@endsection
