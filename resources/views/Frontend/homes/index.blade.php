
@extends('Frontend.main.index')
@section('content')
            <section class="slick-slideshow">
                <div class="slick-custom">
                    <img src="{{asset('frontend/images/slideshow/medium-shot-business-women-high-five.jpeg')}}" class="img-responsive"fluid" alt="">

                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">Cool Fashion</h1>

                                    <p class="lead text-white mt-lg-3 mb-lg-5">Little fashion template comes with total 8 HTML pages provided by Tooplate website.</p>

                                    <a href="{{ route('shop.story.index') }}" class="btn custom-btn">Learn more about us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slick-custom">
                    <img src="{{asset('frontend/images/slideshow/team-meeting-renewable-energy-project.jpeg') }}" class="img-fluid" alt="">

                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">New Design</h1>

                                    <p class="lead text-white mt-lg-3 mb-lg-5">Please share this Little Fashion template to your friends. Thank you for supporting us.</p>

                                    <a href="{{ route('shop.story.index') }}" class="btn custom-btn">Explore products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slick-custom">
                    <img src="{{ asset('frontend/images/slideshow/two-business-partners-working-together-office-computer.jpeg') }}"" class="img-fluid" alt="">

                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">Talk to us</h1>

                                    <p class="lead text-white mt-lg-3 mb-lg-5">Tooplate is one of the best HTML CSS template websites for everyone.</p>

                                    <a href="{{ route('shop.story.index') }}" class="btn custom-btn">Work with us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section class="about section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Bắt đầu với <span>LeoLeo</span> Shop</h2>
                        </div>

                        <div class="col-lg-2 col-12 mt-auto mb-auto">
                            <ul class="nav nav-pills mb-5 mx-auto justify-content-center align-items-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Giới thiệu</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-youtube-tab" data-bs-toggle="pill" data-bs-target="#pills-youtube" type="button" role="tab" aria-controls="pills-youtube" aria-selected="true">Sản phẩm</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-skill-tab" data-bs-toggle="pill" data-bs-target="#pills-skill" type="button" role="tab" aria-controls="pills-skill" aria-selected="false">Doanh số</button>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-10 col-12">
                            <div class="tab-content mt-2" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <img src="{{ asset('frontend/images/pim-chu-z6NZ76_UTDI-unsplash.jpeg') }}" class="img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3">Cung cấp các <span>sản phẩm</span> thiết yếu cho<br> <span> cuộc sống</span> của bạn</h4>

                                                <p>LeoLeo Shop là công ty cung cấp các sản phẩm liên quan tới thời trang cũng như trang trí</p>

                                                <p>Kể từ khi được thành lập, LeoLeo trở thành một trong số những công ty thời trang chuyên phân phối các sản phẩm thời trang cao cấp, lịch lãm và sang trọng của nhiều thương hiệu lớn tại Việt Nam.</p>
                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="{{ route('shop.story.index') }}" class="custom-link mb-2">
                                                        Nhiều hơn về chúng tôi
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-youtube" role="tabpanel" aria-labelledby="pills-youtube-tab">

                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="https://www.youtube-nocookie.com/embed/f_7JqPDWhfw?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3">Sản phẩm của chúng tôi</h4>

                                                <p>Hơn ba năm kinh doanh, Chúng tôi đã cung cấp ra thị trường hàng ngàn sản phẩm khác nhau liên quan đến lĩnh vực thời trang</p>

                                                <p>Sản phẩm của của LeoLeo luôn luôn nhận được các phản hồi tích cực của khách hàng</p>

                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="contact.html" class="custom-link mb-2">
                                                        Làm việc với chúng tôi
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-skill" role="tabpanel" aria-labelledby="pills-skill-tab">
                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <img src="{{ asset('frontend/images/cody-lannom-G95AReIh_Ko-unsplash.jpeg') }}" class="img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3">Những thành tựu mà LeoLeo đạt được</h4>

                                                <p>Phục vụ cho hàng triệu khách hàng nhu cầu ăn mặc trong cuộc sống hàng ngày</p>

                                                <div class="skill-thumb mt-3">

                                                    <strong>Doanh thu</strong>
                                                        <span class="float-end">600 tỷ</span>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                            </div>

                                                    <strong>Lượng khách hàng mới</strong>
                                                        <span class="float-end">2,5 triệu</span>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                                            </div>

                                                    <strong>Lợi nhuận</strong>
                                                        <span class="float-end">450 tỷ</span>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                            </div>

                                                </div>

                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="products.html" class="custom-link mb-2">
                                                        Khám phá sản phẩm
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="front-product">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12">
                            <img src="{{ asset('frontend/images/retail-shop-owner-mask-social-distancing-shopping.jpg') }}" class="img-fluid" alt="">
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="px-5 py-5 py-lg-0">

                                <h2 class="mb-4"><span>Chia sẻ</span> của đối tác</h2>

                                <p class="lead mb-4">Chúng tôi thực sự rất hài lòng về những sản phẩm mà LeoLeo cung cấp.</p>

                                <a href="{{ route('shop.product.index') }}" class="custom-link">
                                    Sản phẩm
                                    <i class="bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="featured-product section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="mb-5">Sản phẩm phổ biến</h2>
                        </div>
                        @foreach($products as $key)
                        @if($key->category_id == 25)
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
                        @endif
                        @endforeach
                        <div class="col-12 text-center">
                            <a href="{{ route('shop.product.index') }}" class="view-all">Tất cả sản phẩm</a>
                        </div>

                    </div>
                </div>
            </section>
@endsection
