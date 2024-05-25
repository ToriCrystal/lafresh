<div class="card mb-3">
    <div @class(['card-status-bottom', $order->status->colorBg()])></div>
    <div class="card-header">
        <h3 @class(['card-title d-flex flex-row align-items-center', $order->status->colorText()])>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-loading" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M2 3h1a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2h15" />
                <path d="M9 6m0 3a3 3 0 0 1 3 -3h4a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-4a3 3 0 0 1 -3 -3z" />
                <path d="M9 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M18 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            </svg>
            <span class="px-2">{{ $order->status->description() }}</span>
        </h3>
    </div>
    <div class="card-body">
        @foreach ($productData[$order->id] as $product)
            <div class="row row-0 align-items-center my-3">
                <div class="col-md-2 col-12 mb-3">
                    <img src="{{ asset($product['product']->feature_image) }}"
                        class="w-100 object-cover card-img-center" alt="Product Image">
                </div>
                <div class="col-md-10 col-12 mb-9">
                    <div class="card-body pe-0">
                        <div class="d-flex flex-column">
                            <h3 class="card-title title-text d-flex flex-row gap-3 mb-2 align-items-center">
                                <span>{{ $product['product']->name }}</span>
                            </h3>
                            <div class="d-flex flex-row gap-3 justify-content-between align-items-center flex-wrap">
                                <div class="d-flex flex-column">
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong>Số lượng/ Đơn vị tính:
                                                {{ $product['qty'] }}/{{ $product['product']->unit->description() }}</strong>
                                        </li>
                                    </ul>
                                </div>
                                <p class="total fw-bold">
                                    <sup>{{ format_price($product['product']->price_promotion) }}</sup>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="border-bottom mb-3"></div>
        <div class="d-flex flex-row justify-content-between align-items-center">
            <a href="{{ route('order.show', $order->id) }}" class="d-flex gap-2 align-items-center nav-link">
                <i class="fa-solid fa-circle-info"></i>
                @lang('Chi tiết đơn hàng')
            </a>
            <div class="d-flex gap-2">
                <span class="fw-bold">@lang('Tổng tiền'): </span>
                <span><strong>{{ format_price($order->total) }}</strong></span>
            </div>
        </div>
    </div>
</div>
