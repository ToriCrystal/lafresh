<table id="tableProduct" class="table table-transparent table-responsive mb-0">
    <thead>
        <tr>
            <th class="text-center" style="width: 1%"></th>
            <th>{{ __('Sản phẩm') }}</th>
            <th class="text-center" style="width: 12%">{{ __('Số lượng') }}</th>
            @if (isset($user))
                @if ($user->roles->value == 2)
                    <th class="text-center" style="width: 12%">{{ __('Tặng') }}</th>
                @endif
            @endif
            <th class="text-end" style="width: 1%">{{ __('Đơn giá') }}</th>
            <th class="text-end" style="width: 1%">{{ __('ĐV tính') }}</th>
            <th class="text-end" style="width: 1%">{{ __('Tổng tiền') }}</th>
        </tr>
    </thead>
    <tbody>
        @each('admin.orders.partials.item-product', $order->details ?? [], 'order_detail', 'admin.orders.partials.no-item-product')
    </tbody>
</table>