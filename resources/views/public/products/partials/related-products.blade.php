<div class="features-products text-center py-5">
    <div class="container">
        <div class="hr-text">
            {{--            @dd($settings) --}}
            <span class="title-section">Sản phẩm liên quan</span>
        </div>
        <div class="row py-2 flex-wrap flex-row">
            @foreach ($related as $item)
                <div class="col-md-3 col-12 mb-3">
                    <div class="box-product">
                        <a href="{{ route('product.show', $item->slug) }}" class="text-decoration-none">
                            <img src="{{ asset($item->feature_image) }}" alt=""
                                class="product-img img-fluid rounded mx-auto" width="100%">
                            <div class="product-content py-3">
                                <div class="d-flex flex-column">
                                    <span class="product-title text-uppercase my-3 text-decoration-none text-center">
                                        {{ $item->name }}
                                    </span>
                                    <span
                                        class="fw-bold text-muted text-center">{{ __('Giá: ' . format_price($product->price_promotion) . ' / ' . $product->unit->description()) }}
                                    </span>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
