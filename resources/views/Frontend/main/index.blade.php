<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Leo Leo Shop</title>
        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">
        <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/bootstrap-icons.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}"/>
        <link href="{{ asset('frontend/css/tooplate-little-fashion.css') }}" rel="stylesheet">
    </head>

    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="{{ route('shop.home.index') }}">
                        <strong><span>LeoLeo</span> Shop</strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="{{ route('shop.home.signIn') }}" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('Shop/home') ? 'active' : '' }}" href="{{ route('shop.home.index') }}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('Shop/about') ? 'active' : '' }}" href="{{ route('shop.story.index') }}">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('Shop/product') ? 'active' : '' }}" href="{{ route('shop.product.index') }}">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('Shop/faq') ? 'active' : '' }}" href="{{ route('shop.faq.index') }}">FAQs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('Shop/contact') ? 'active' : '' }}" href="{{ route('shop.contact.index') }}">Contact</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="{{ route('shop.home.signIn') }}" class="bi-person custom-icon me-3"></a>

                            <a href="" class="bi-bag custom-icon"></a>
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')


        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="{{ route('shop.home.index') }}">LeoLeo</a> Shop</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>LeoLeo Shop</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.facebook.com/Gnoul.tran99/" target="_blank">LeoLeo</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Danh mục</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="{{ route('shop.story.index') }}" class="footer-menu-link">About</a></li>

                            <li class="footer-menu-item"><a href="{{ route('shop.product.index') }}" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="{{ route('shop.faq.index') }}" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="{{ route('shop.contact.index') }}" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Mạng xã hội</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/js/Headroom.js') }}"></script>
        <script src="{{ asset('frontend/js/jQuery.headroom.js') }}"></script>
        <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/js/custom.js') }}"></script>
    </body>
</html>
