<section class="product-section py-3" id="product_section">
    <div class="container">
        <div class="hr-text">
            <span class="title-section">@lang('Sản phẩm')</span>
        </div>
        <div class="owl-carousel">
            @foreach ($products as $key => $product)
                <div class="item bg-white p-3 rounded-5">
                    <a href="{{ route('product.show', $product->slug) }}" class="nav-link">
                        <div class="d-flex flex-column justify-content-center align-items-center nav-link">
                            <img src="{{ asset($product->feature_image) }}" class="object-contain"
                                alt="{{ $product->name }}" width="100%" height="350px">
                            <div class="d-flex flex-column">
                                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                    <h3 class="text-cyan text-uppercase text-center">{{ $product->name }}</h3>
                                </a>
                                <h4 class="fw-bold text-center">
                                    {{ __('Giá: ' . format_price($product->price_promotion) . ' / ' . $product->unit->description()) }}
                                </h4>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

        <div class="row">

        </div>
    </div>
</section>
