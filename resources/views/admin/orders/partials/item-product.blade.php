<tr @class([
    'item-product',
    'product-' . $order_detail->detail['product']['id'],
]) data-product-id="{{ $order_detail->detail['product']['id'] }}">
    <td class="align-middle">
        {{-- <span class="cursor-pointer remove-item-product" data-id="{{ $order_detail->id }}"><i class="ti ti-x"></i></span> --}}
        <x-input type="hidden" name="order_detail[id][]" :value="$order_detail->id" />
        <x-input type="hidden" name="order_detail[product_id][]" :value="$order_detail->detail['product']['id']" />
        <x-input type="hidden" name="order_detail[product_unit][]" :value="$order_detail->unit->value" />
    </td>
    <td class="align-middle">
        <x-link :href="route('admin.product.edit', $order_detail->detail['product']['id'])" target="_blank" :title="$order_detail->detail['product']['name']" />
    </td>
    <td class="text-end">
        <x-input type="number" name="order_detail[product_qty][]" :value="$order_detail->qty" min="1" readonly
            autocomplete="off" :data-parsley-number-message="__('Trường này phải là số.')" :data-parsley-min-message="__('Giá trị phải lớn hơn 1.')" />
    </td>
    @if ($order_detail->qty_donate)
        <td class="text-end qty_donate">
            <x-input type="number" name="order_detail[product_qty_donate][]" :value="$order_detail->qty_donate ?? 0" min="0" readonly
                autocomplete="off" :data-parsley-number-message="__('Trường này phải là số.')" :data-parsley-min-message="__('Giá trị phải lớn hơn 0.')" />
        </td>
    @endif

    <td class="unit-price align-middle text-end">{{ format_price($order_detail->unit_price) }}</td>
    <td class="align-middle">{{ $order_detail->unit->description() }}</td>
    <td class="total-price align-middle text-end">
        {{ format_price($order_detail->unit_price_purchase_qty ?: $order_detail->unit_price * $order_detail->qty) }}
    </td>
</tr>
