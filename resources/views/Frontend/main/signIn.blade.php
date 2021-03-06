@extends('Frontend.main.index')
@section('content')
<section class="sign-in-form section-padding">
    <div class="container">
        <div class="row">
            @if(Session::has('flag'))
                <div class="alert alert-{{ Session::get('flag') }}"> {{ Session::get('message') }}</div>
            @endif
            <div class="col-lg-8 mx-auto col-12">

                <h1 class="hero-title text-center mb-5">Đăng nhập</h1>

                <div class="row">
                    <div class="col-lg-8 col-11 mx-auto">
                        <form role="form" action="{{ route('shop.home.shopLogin') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                            @csrf

                            <div class="form-floating mb-4 p-0">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating p-0">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                Đăng nhập
                            </button>

                            <p class="text-center">Bạn chưa có tài khoản? <a href="{{ route('shop.home.signUp') }}"> Đăng ký</a></p>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
