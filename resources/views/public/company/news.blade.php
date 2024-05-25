@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => [['label' => trans('Tin tức')]],
    ])
    <section id="activism_section" class="activism-section mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-12">
                    <h1 class="title-section mb-3" style="font-size: 2em">Tin tức
                    </h1>

                    <div class="blog">
                        <div class="row row-0 gap-3 mb-3">
                            <div class="col-3">
                                <img src="{{ asset('assets/images/news_1.jpg') }}"
                                    class="w-100 h-100 object-cover card-img-start" alt="Bài Post">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h4 class="card-title title-text">CHƯƠNG TRÌNH “MẮT SÁNG KHỎE – TRẺ VUI XUÂN” – XUÂN
                                        TÌNH NGUYỆN 2023
                                    </h4>
                                    <p>
                                        Người viết: Mevivu / 09.07.2023
                                    </p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                        deleniti fugit
                                        incidunt, iste, itaque minima
                                        neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-0 gap-3 mb-3">
                            <div class="col-3">
                                <img src="{{ asset('assets/images/news_2.jpg') }}"
                                    class="w-100 h-100 object-cover card-img-start" alt="Bài Post">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h4 class="card-title title-text">CHƯƠNG TRÌNH “MẮT SÁNG KHỎE – TRẺ VUI XUÂN” – XUÂN
                                        TÌNH NGUYỆN 2023
                                    </h4>
                                    <p>
                                        Người viết: Mevivu / 09.07.2023
                                    </p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                        deleniti fugit
                                        incidunt, iste, itaque minima
                                        neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
