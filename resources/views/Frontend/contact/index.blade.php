
@extends('Frontend.main.index')
@section('content')
        <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 header-info">
                            <h1>
                                <span class="d-block text-primary">Phản hồi</span>
                                <span class="d-block text-dark">của khách hàng</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <img src="{{asset('frontend/images/header/positive-european-woman-has-break-after-work.jpg')}}" class="header-image img-fluid" alt="">
                <!-- <img src="https://atpsoftware.vn/wp-content/uploads//2019/04/1-229.png" class="header-image img-fluid" alt=""> -->
            </header>

            <section class="contact section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Phản <span>hồi</span></h2>

                            <form class="contact-form me-lg-5 pe-lg-3" role="form">

                                <div class="form-floating">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required>

                                    <label for="name">Tên của bạn</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>

                                    <label for="email">Địa chỉ email</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input type="subject" name="subject" id="subject"class="form-control" placeholder="Subject" required>

                                    <label for="subject">Công việc</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <textarea id="message" name="message" class="form-control" placeholder="Leave a comment here" required style="height: 160px"></textarea>

                                    <label for="message">Phản hồi của bạn dành cho chúng tôi</label>
                                </div>

                                <div class="col-lg-5 col-6">
                                    <button type="submit" class="form-control">Gửi</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6 col-12 mt-5 ms-auto">
                            <div class="row">
                                <div class="col-6 border-end contact-info">
                                    <h6 class="mb-3">Website</h6>

                                    <a href="mailto:hello@company.com" class="custom-link">
                                        leoleoshop.com.vn
                                        <i class="bi-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <div class="col-6 contact-info">
                                	<h6 class="mb-3">Email</h6>

                                    <a href="mailto:studio@company.com" class="custom-link">
                                        tranducluong8899@gmail.com
                                        <i class="bi-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <div class="col-6 border-top border-end contact-info">
                                    <h6 class="mb-3">Văn phòng</h6>

                                    <p class="text-muted">83 Tân Triều - Tân Triều - Thanh Trì - Hà Nội</p>
                                </div>

                                <div class="col-6 border-top contact-info">
                                    <h6 class="mb-3">Mạng xã hội</h6>

                                    <ul class="social-icon">

                                        <li><a href="#" class="social-icon-link bi-messenger"></a></li>

                                        <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
@endsection
