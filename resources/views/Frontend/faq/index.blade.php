
@extends('Frontend.main.index')
@section('content')

<header class="site-header section-padding d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12">
                <h1>
                    <span class="d-block text-primary">Câu hỏi phổ biến</span>
                    <span class="d-block text-dark">& câu trả lời của chúng tôi</span>
                </h1>
            </div>
        </div>
    </div>
</header>

<section class="faq section-padding">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-8 col-12">
                <h2>Thông tin chung</h2>
                <div class="accordion" id="accordionGeneral">
                    @foreach($faqs as $key => $faq)
                    @if($faq->type == 1)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralOne" aria-expanded="true" aria-controls="accordionGeneralOne">
                            {{$faq->name}}
                            </button>
                        </h2>

                        <div id="accordionGeneralOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionGeneral">
                            <div class="accordion-body">
                                <p class="large-paragraph">{{$faq->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

                <h2 class="mt-5">Sản phẩm <span>của chúng tôi</span></h2>

                <div class="accordion" id="accordionProduct">
                    @foreach($faqs as $key => $faq)
                    @if($faq->type == 1)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProductOne" aria-expanded="true" aria-controls="accordionProductOne">
                            {{ $faq->name}}
                            </button>
                        </h2>

                        <div id="accordionProductOne" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionProduct">
                            <div class="accordion-body">
                                <p class="large-paragraph">
                                    {{ $faq->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
        </div> -->
        <div class="row">

<div class="col-lg-8 col-12">
    <h2>Thông tin chung</h2>

    <div class="accordion" id="accordionGeneral">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralOne" aria-expanded="true" aria-controls="accordionGeneralOne">
                Khách hàng ở tỉnh sẽ đổi hàng như thế nào?
                </button>
            </h2>

            <div id="accordionGeneralOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionGeneral">

                <div class="accordion-body">
                    <p class="large-paragraph">Chào bạn, nếu bạn đang ở tỉnh thành hiện tại chưa có cửa hàng LeoLeo, bạn có thể liên hệ bộ phận Chăm sóc khách hàng qua Website, Fanpage, Hotline để nhân viên hỗ trợ kiểm tra cửa hàng và thông báo cho bạn nhé!</p>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralTwo" aria-expanded="false" aria-controls="accordionGeneralTwo">
                Thời gian áp dụng đổi sản phẩm là bao lâu?
                </button>
            </h2>

            <div id="accordionGeneralTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionGeneral">

                <div class="accordion-body">
                    <p class="large-paragraph">Chào bạn, sản phẩm được đổi hàng trong vòng 7 ngày bạn nhé. Bạn vui lòng gửi/mang theo hóa đơn và sản phẩm phải còn nguyên tem mác, còn nguyên trạng như lúc nhận hàng đến LeoLeo để được hỗ trợ đổi hàng ạ.</p>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralThree" aria-expanded="false" aria-controls="accordionGeneralThree">
                Leo Leo có chấp nhận trả sản phẩm hoàn tiền không?
                </button>
            </h2>

            <div id="accordionGeneralThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionGeneral">

                <div class="accordion-body">
                    <p class="large-paragraph">Chào bạn, LeoLeo có chấp nhận trả sản phẩm hoàn tiền nhưng chỉ đối với trường hợp khi lỗi sự cố hay lỗi sản phẩm xuất phát từ phía LeoLeo và sản phẩm đó hoặc sản phẩm tương tự không còn hàng.</p>
                </div>
            </div>
        </div>

    </div>

    <h2 class="mt-5">Về sản phẩm</span></h2>

    <div class="accordion" id="accordionProduct">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProductOne" aria-expanded="true" aria-controls="accordionProductOne">
                Sản phẩm có được bảo hành không?
                </button>
            </h2>

            <div id="accordionProductOne" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionProduct">

                <div class="accordion-body">
                    <p class="large-paragraph">Chào bạn, LeoLeo không có chính sách bảo hành cho sản phẩm nhé. Rất xin lỗi và mong bạn thông cảm.</p>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProductTwo" aria-expanded="false" aria-controls="accordionProductTwo">
                Sản phẩm có giống với màu và hình ảnh thực tế sản phẩm không?
                </button>
            </h2>

            <div id="accordionProductTwo" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionProduct">

                <div class="accordion-body">
                    <p class="large-paragraph">Chào bạn, sản phẩm như hình bạn nhé. Màu sắc qua ảnh chụp sẽ có thể có chút chênh lệch không đáng kể so với thực tế ạ.</p>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
    </div>
</section>
@endsection
