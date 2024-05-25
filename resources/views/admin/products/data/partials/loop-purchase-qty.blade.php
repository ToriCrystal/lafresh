<div class="row border p-2 mb-3 item-purchase-qty">
    <div class="col-12 col-md-4">
        <label class="control-label">{{ __('Loại: ') }}</label>
        <x-select name="purchase_qty[type][]" class="form-select" :required="true">
            @foreach ($product_purchase_qty_type as $key => $value)
                <x-select-option :option="$purchase_qty['type'] ?? 0" :value="$key" :title="$value" />
            @endforeach
        </x-select>
    </div>
    <div class="col-12 col-md-4">
        <label class="control-label" for="">{{ __('Số lượng: ') }}</label>
        <x-input type="number" name="purchase_qty[qty][]" min="1" :placeholder="__('Số lượng sản phẩm')"
            data-parsley-type-message="{{ __('Trường này phải là số nguyên.') }}" :value="$purchase_qty['qty'] ?? ''" :required="true" />
    </div>
    <div class="col-12 col-md-4">
        <label class="control-label" for="">{{ __('Giá trị: ') }}</label>
    <x-input-number name="purchase_qty[plain_value][]" min="0" :placeholder="__('Giá trị')" :value="$purchase_qty['plain_value'] ?? ''" :required="true" />
    </div>
    <div class="col-12 text-end mt-2">
        <x-button type="button" class="btn-sm btn-outline-danger btn-delete-item-purchase-qty">@lang('Xóa')</x-button>
    </div>
</div>
