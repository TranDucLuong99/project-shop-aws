@extends('Frontend.main.index')
@section('content')
<header class="site-header section-padding-img site-header-image">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 header-info">
                <h1>
                    <span class="d-block text-primary">Công ty</span>
                    <span class="d-block text-dark">Thời trang</span>
                </h1>
            </div>
        </div>
    </div>
    <img src="{{asset('frontend/images/header/businesspeople-meeting-office-working.jpg')}}" class="header-image img-fluid" alt="">
</header>

<section class="team section-padding">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="mb-5">Đội ngũ <span>của chúng tôi</span></h2>
            </div>

            <div class="col-lg-4 mb-4 col-12">
                <div class="team-thumb d-flex align-items-center">
                    <img src="{{asset('frontend/images/people/senior-man-wearing-white-face-mask-covid-19-campaign-with-design-space.jpeg')}}" class="img-fluid custom-circle-image team-image me-4" alt="">

                    <div class="team-info">
                        <h5 class="mb-0">Gnoul Tran</h5>
                        <strong class="text-muted">Ceo</strong>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#don">
                            <i class="bi-plus-circle-fill"></i>
                        </button>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4 col-12">
                <div class="team-thumb d-flex align-items-center">
                    <img src="{{asset('frontend/images/people/senior-man-wearing-white-face-mask-covid-19-campaign-with-design-space.jpeg')}}" class="img-fluid custom-circle-image team-image me-4" alt="">

                    <div class="team-info">
                        <h5 class="mb-0">Jack Nguyen</h5>
                        <strong class="text-muted">Co Founder</strong>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#kelly">
                            <i class="bi-plus-circle-fill"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-lg-0 mb-4 col-12">
                <div class="team-thumb d-flex align-items-center">
                    <img src="{{asset('frontend/images/people/senior-man-wearing-white-face-mask-covid-19-campaign-with-design-space.jpeg')}}" class="img-fluid custom-circle-image team-image me-4" alt="">

                    <div class="team-info">
                        <h5 class="mb-0">Andy Pham</h5>
                        <strong class="text-muted">Founder</strong>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#marie">
                            <i class="bi-plus-circle-fill"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="testimonial section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 mx-auto col-11">
                <h2 class="text-center">Góp ý <br> <span>của khách hàng</span> cho LeoLeo Shop</h2>

                <div class="slick-testimonial">
                    <div class="slick-testimonial-caption">
                        <p class="lead">Chúng tôi sử dụng những chất liệu cao cấp nhất để sử dụng cho sản phẩm của mình</p>

                        <div class="slick-testimonial-client d-flex align-items-center mt-4">
                            <img src="{{asset('frontend/images/people/senior-man-wearing-white-face-mask-covid-19-campaign-with-design-space.jpeg')}}" class="img-fluid custom-circle-image me-3" alt="">

                            <span>Luong Leo, <strong class="text-muted">Nhà thiết kế</strong></span>
                        </div>
                    </div>

                    <div class="slick-testimonial-caption">
                        <p class="lead">Sản phẩm có chất lượng tuyệt vời, độ hoàn thiện cực tốt, không có chỉ thừa, mặc siêu siêu mát</p>

                        <div class="slick-testimonial-client d-flex align-items-center mt-4">
                            <img src="{{asset('frontend/images/people/beautiful-woman-face-portrait-brown-background.jpeg')}}" class="img-fluid custom-circle-image me-3" alt="">

                            <span>Mei, <strong class="text-muted">Phòng ý tưởng</strong></span>
                        </div>
                    </div>

                    <div class="slick-testimonial-caption">
                        <p class="lead">Sản phẩm có chất lượng tuyệt vời, độ hoàn thiện cực tốt, không có chỉ thừa, mặc siêu siêu mát</p>

                        <div class="slick-testimonial-client d-flex align-items-center mt-4">
                            <img src="{{asset('frontend/images/people/portrait-british-woman.jpeg')}}" class="img-fluid custom-circle-image me-3" alt="">

                            <span>May, <strong class="text-muted">Chuyên viên chất liệu</strong></span>
                        </div>
                    </div>

                    <div class="slick-testimonial-caption">
                        <p class="lead">Sản phẩm có chất lượng tuyệt vời, độ hoàn thiện cực tốt, không có chỉ thừa, mặc siêu siêu mát</p>

                        <div class="slick-testimonial-client d-flex align-items-center mt-4">
                            <img src="{{asset('frontend/images/people/woman-wearing-mask-face-closeup-covid-19-green-background.jpeg')}}" class="img-fluid custom-circle-image me-3" alt="">
                            <span>Cathy, <strong class="text-muted">Chuyên viên marketing</strong></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
