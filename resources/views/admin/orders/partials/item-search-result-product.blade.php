<div class="list-group-item">
    <div class="row align-items-center">
        <div class="col-auto">
            <img class="avatar" src="{{ asset($product->feature_image) }}" alt="">
        </div>
        <div class="col text-truncate d-flex justify-content-between">
            <div class="">
                <span class="">{{ $product->name }}</span>
                <small class="fw-bold">
                    <span class="mx-1">-</span>
                    (
                    @if ($product->price_promotion)
                        {{ format_price($product->price_promotion) }}
                        <span> - </span>
                        <s>{{ format_price($product->price) }}</s>
                    @else
                        {{ format_price($product->price) }}
                    @endif
                    )
                </small>
            </div>
            <x-button type="button" class="add-product btn-sm btn-outline-primary" :data-product-id="$product->id">
                <i class="ti ti-plus"></i>
                {{ __('Thêm') }}
            </x-button>
        </div>
    </div>
</div>
