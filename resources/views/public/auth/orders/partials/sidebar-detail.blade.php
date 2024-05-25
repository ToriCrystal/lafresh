<div class="col-md-4 col-12 position-sticky" style="top: 20px">
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title title-text pb-2 border-bottom">@lang('Thông tin đơn hàng')</h2>
            <p class="mb-3"><strong>@lang('Họ và tên'): </strong><span class="fw-normal">{{ $order->customer_fullname }}</span></p>
            <p class="mb-3"><strong>@lang('Điện thoại'): </strong><span class="fw-normal">{{ $order->customer_phone }}</span></p>
            <p class="mb-3"><strong>@lang('Email'): </strong><span class="fw-normal">{{ $order->customer_email }}</span></p>
            <p class="mb-3"><strong>@lang('Địa chỉ'): </strong><span class="fw-normal">{{ $order->shipping_address }}</span></p>
            <div class="d-flex justify-content-between align-items-center pb-2 fw-bold">
                <span>@lang('PTTT'): </span>
                <span class="">{{ $order->payment_method->description() }}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-2 fw-bold">
                <span>@lang('Tạm tính'): </span>
                <span class="text-danger">{{ format_price($order->sub_total) }}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-2 fw-bold">
                <span>@lang('Vận chuyển'): </span>
                <div class="">
                    <span>{{ $order->shipping_method->description() }}</span>
{{--                    @if ($order->isShippingGrab())--}}
{{--                        <span class="mx-1">-</span>--}}
{{--                        <span>{{ $order->labelShippingService() }}</span>--}}
{{--                    @endif--}}
{{--                    <span class="mx-1">-</span>--}}
{{--                    @if($order->isShippingViettelPost() || $order->shippingCreatedOrder())--}}
{{--                        <span class="text-danger">{{ format_price($order->shipping_fee) }}</span>--}}
{{--                    @else--}}
{{--                        <span class="text-danger">@lang('Chưa xử lý')</span>--}}
{{--                    @endif--}}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-2 fw-bold">
                <span>@lang('Tổng tiền'): </span>
                <span class="total-cart text-danger fs-2">{{ format_price($order->total) }}</span>
            </div>
{{--            <div class="fw-bold d-flex justify-content-between align-items-center pb-2">--}}
{{--                <span>@lang('Trạng thái vận chuyển'):</span>--}}
{{--                <span @class(['status-cart fw-normal', $order->shipping_status->colorText()])>{{ $order->shipping_status->description }}</span>--}}
{{--            </div>--}}
{{--            <div class="fw-bold d-flex justify-content-between align-items-center pb-2">--}}
{{--                <span>@lang('Trạng thái thanh toán'):</span>--}}
{{--                <span @class(['status-cart fw-normal', $order->payment_status->colorText()])>{{ $order->payment_status->description() }}</span>--}}
{{--            </div>--}}
            <div class="fw-bold d-flex justify-content-between align-items-center pb-2">
                <span>@lang('Trạng thái'):</span>
                <span @class(['status-cart fw-normal', $order->status->colorText()])>{{ $order->status->description() }}</span>
            </div>
            @if ($order->isCancel())
                <a href="#" class="btn btn-danger w-100 text-uppercase my-3 open-modal-delete"
                   data-bs-toggle="modal"
                   data-bs-target="#modalDelete"
                   data-route="{{ route('order.cancel', $order->id) }}"
                >@lang('Huỷ đơn')</a>
            @endif
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title title-text pb-2 border-bottom">@lang('Ghi chú đơn hàng')</h2>
            <p>{{ $order->note }}</p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title title-text pb-2 border-bottom">@lang('Chính sách mua hàng')</h2>
            <div class="policy">
                <ul class="list-unstyled">
                    <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                    <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                    <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống.</li>
                    <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
