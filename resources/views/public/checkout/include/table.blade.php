<table class="table table-vcenter card-table sticky-table tbl-cart">
    <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th class="text-center">Số lượng</th>
            <th class="text-center">Đơn giá</th>
            <th class="text-center">Tặng</th>

            <th class="text-center">Tổng tiền</th>
            <th class="w-1"></th>
        </tr>
    </thead>
    <tbody>
        @if ($data)
            <tr>
                <td class="align-middle">{{ $stt }}</td>
                <td class="align-middle">
                    <a href="{{ route('product.show', ['slug' => $data->slug]) }}" target="_blank" title=""
                        class="text-decoration-none">
                        <span>{{ $data->name }}</span>
                    </a>
                </td>
                <td class="text-center">{{ $quantity }}</td>
                <td class="unit-price align-middle">
                    {{ $data->price_promotion }}<sup>đ</sup>
                </td>
                <td class="text-center">0</td>
                <td class="align-middle">
                    {{ format_price($data->price_selling) }}<sup>đ</sup>
                </td>
            </tr>
        @else
            <tr>
                <td class="align-middle" colspan="13">Hiện không có sản phẩm</td>
            </tr>
        @endif
    </tbody>
</table>
