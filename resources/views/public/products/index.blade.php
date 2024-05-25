@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => $breadcrums,
    ])
    <!-- Content -->
    <main class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-lg-9 col-11">
                @include('public.products.partials.filter')
                <!-- Product -->
                <div class="container">
                    @if ($products->count() > 0)
                        <div class="grid-product">
                            @foreach ($products as $product)
                                <div class="grid-items">
                                    <a href="{{ route('product.show', $product->slug) }}"
                                        class="d-inline-flex justify-content-center">
                                        <div class="pb-3 d-flex justify-content-start flex-column bg-white rounded-3">
                                            <img src="{{ asset($product->feature_image) }}" class="product-img rounded p-2"
                                                width="100%">
                                            <a href="{{ route('product.show', $product->slug) }}"
                                                class="fs-3 mt-3 fw-bold text-uppercase text-decoration-none nav-link text-center px-3">
                                                {{ $product->name }}
                                            </a>

                                            <span class="text-secondary mt-3 text-decoration-none text-center">
                                                {{ __('Giá: ' . format_price($product->price_promotion) . ' / ' . $product->unit->description()) }}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        @include('public.partials.no-record')
                    @endif

                    <!-- Product -->
                </div>
                {{ $products->appends(request()->all())->links() }}
            </div>

        </div>
    </main>
@endsection
