<ul class="search_box list-unstyled">
    @forelse ($products as $product)
        <li class="px-2 mb-3">
            <a class="dropdown-item text-wrap nav-link" href="{{ route('product.show', $product->slug) }}">
                <div class="row align-items-center border-bottom pb-3">
                    <div class="col-md-3 col-12">
                        <img src="{{ asset($product->feature_image) }}" alt="{{ $product->name }}" class="rounded">

                    </div>
                    <div class="col-md-9 col-12">
                        <div class="d-flex flex-column">
                            <div class="fw-bold text-cyan text-truncate text-uppercase" style="max-width: 250px">
                                {{ $product->name }}
                            </div>
                            <div class="d-flex align-items-start justify-content-start flex-column">
                                <span class="fw-semibold">
                                    @lang('Giá khuyến mãi:')
                                    <small class="text-cyan fw-bold fs-5">
                                        {{ __(format_price($product->price_promotion) . ' / ' . $product->unit->description()) }}
                                    </small>
                                </span>
                                <small class="text-decoration-line-through text-danger fs-6">
                                    {{ __('Giá gốc: ' . format_price($product->price) . ' / ' . $product->unit->description()) }}
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

            </a>
        </li>
    @empty
        <li>
            @include('public.partials.no-record')
        </li>
    @endforelse
</ul>
