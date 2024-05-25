@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', ['breadcrums' => $breadcrums])
    <div class="container">
        <div class="hr-text">
            <h2 class="text-uppercase fw-bold title-section py-3 text-dark bg-transparent">@lang('Chi tiết đơn hàng')</h2>
        </div>
        <div class="row align-items-start">
            <div class="col-md-8 col-12">
                <span>@lang('Mã đơn hàng') <strong>#{{ $order->id }}</strong></span>
                @foreach ($productDataShow as $index => $product)
                    <div class="card my-3">
                        <div class="row">
                            <div class="col-md-3 col-12 py-3">
                                @if (!empty($product->feature_image))
                                    <img src="{{ asset($product->feature_image) }}" alt="" class="img-fluid">
                                @endif
                            </div>
                            <div class="col-12 col-md-9 p-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="title-text">{{ $product->name }}</span>
                                    </div>
                                    <div class="d-flex flex-row gap-3 justify-content-between align-items-center flex-wrap">
                                        <div class="d-flex flex-column">
                                            <div class="my-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                    <span class="fw-bold">@lang('Thông tin sản phẩm')</span>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li><strong class="px-2">@lang('Mã sản phẩm')</strong>: {{ $product->sku }}</li>
                                            </ul>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="">
                                                <span class="title-text">@lang('Số lượng')</span>
                                                <span class="mx-2">-</span>
                                                <span class="ml-2">{{ $qty[$index] }}</span>
                                                @if (auth()->check())
                                                    <span class="mx-1">x</span>
                                                    <span class="fw-bold">{{ format_price($product->price_promotion) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 border-top ">
                                        <h2 class="text-danger fw-bold pt-3 text-end">
                                            {{-- {{ format_price($qty[$index] * $product->price_promit) }} --}}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @include('public.auth.orders.partials.sidebar-detail')
        </div>
    </div>
@endsection
