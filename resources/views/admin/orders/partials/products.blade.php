@if (!isset($order))
    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAddProduct">
        <i class="ti ti-plus"></i> {{ __('Thêm sản phẩm') }}
    </button>
@endif
<table id="tableProduct" class="table table-transparent table-responsive mb-0">
    <thead>
        <tr>
            <th class="text-center" style="width: 1%"></th>
            <th>{{ __('Sản phẩm') }}</th>
            <th class="text-start" style="width: 12%">{{ __('Số lượng') }}</th>
            @if (isset($order) && $order->user->roles == App\Enums\User\UserRoles::Seller)
                <th class="text-start" style="width: 12%">{{ __('Tặng') }}</th>
            @endif
            <th class="text-end" style="width: 1%">{{ __('Đơn giá') }}</th>
            <th class="text-start" style="width: 1%">{{ __('ĐV tính') }}</th>
            <th class="text-end" style="width: 1%">{{ __('Tổng tiền') }}</th>
        </tr>
    </thead>
    <tbody>
        @each('admin.orders.partials.item-product', $order->details ?? [], 'order_detail', 'admin.orders.partials.no-item-product')
    </tbody>
</table>

@include('admin.orders.partials.total', [
    'total' => $order->total ?? 0,
    'sub_total' => $order->sub_total ?? 0,
    'discount' => $order->discount ?? 0,
    'bonus' => $order->bonus ?? 0,
    'user' => $order->user->roles ?? null,
])
