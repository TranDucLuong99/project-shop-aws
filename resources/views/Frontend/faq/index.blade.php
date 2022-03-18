
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
        <div class="row">
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
        </div>
    </div>
</section>
@endsection
