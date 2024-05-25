@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => $breadcrums,
    ])
    <!-- Content -->
    <div class="container py-4">
        <div class="box-products row mb-3 p-0 flex-row justify-content-between">
            <div class="col-xl-5 col-lg-6 col-12">
                <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper"
                    thumbs-swiper=".mySwiper2" loop="true" space-between="10" navigation="true">
                    @foreach ($product->gallery() as $key => $item)
                        <swiper-slide>
                            <a href="{{ asset($item) }}" data-fancybox="gallery">
                                <img src="{{ asset($item) }}" />
                            </a>
                        </swiper-slide>
                    @endforeach
                </swiper-container>

                <swiper-container class="mySwiper2" space-between="10" slides-per-view="5" free-mode="true"
                    watch-slides-progress="true">
                    @foreach ($product->gallery() as $key => $item)
                        <swiper-slide>
                            <img src="{{ asset($item) }}" />
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
                @include('public.products.include.form')
            </div>
        </div>
        <hr>
        <div class="infomation-products container d-flex flex-row p-0 my-3">
            <ul class="nav nav-tabs col-3 d-flex flex-column border-0 shadow-none">
                <li class="nav-item shadow-none">
                    <a class="nav-link active fw-bold text-body-tertiary text-uppercase" id="home-tab" data-bs-toggle="tab"
                        href="#home">@lang('Thông tin sản phẩm')</a>
                </li>
            </ul>

            <div class="tab-content col px-2">
                <div class="tab-pane fade show active" id="home">
                    {!! $product->desc !!}
                </div>
            </div>
        </div>
    </div>
    <hr>


    @include('public.products.partials.related-products')
    </div>
    <!-- Content -->
@endsection
