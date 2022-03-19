@extends('Frontend.main.index')
@section('content')

<section class="sign-in-form section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 mx-auto col-12">

                <h1 class="hero-title text-center mb-5">Đăng ký</h1>


                <div class="row">
                    <div class="col-lg-8 col-11 mx-auto">
                        <form role="form" action="{{ route('shop.home.signUpUp') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">

                            <div class="form-floating">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating my-4">
                                <input type="password" name="password" id="password" pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="form-floating">
                                <input type="name" name="name" id="name" class="form-control" placeholder="Name" required>

                                <label for="name">Name</label>
                            </div>
                            <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                Đăng ký
                            </button>
                            <p class="text-center">Bạn đã có tài khoản? <a href="sign-in.html">Đăng nhập</a></p>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
