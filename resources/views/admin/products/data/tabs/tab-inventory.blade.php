<div id="inventory" class="tab-pane p-3" role="tabpanel" aria-labelledby="tabInventory">
    <div class="row mb-3">
        <label class="col-5 col-form-label" for="">@lang('Mã sản phẩm')</label>
        <div class="col">
            <x-input name="product[sku]" 
                :value="$product->sku ?? old('product.sku')" 
                :placeholder="__('Mã sản phẩm')" />
        </div>
    </div>
    <div class="row">
        <label class="col-5 col-form-label" for="">{{ __('Trạng thái kho hàng') }}</label>
        <div class="col">
            <x-select name="product[in_stock]" class="form-select">
                @foreach ($in_stock as $key => $value)
                    <x-select-option :option="isset($product->in_stock) ? $product->in_stock ?: '0' : ''" :value="$key" :title="$value" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>