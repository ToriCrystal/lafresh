<div id="price" class="tab-pane active show p-3" role="tabpanel" aria-labelledby="tabPrice">
    <div class="row mb-3">
        <label class="col-5 col-form-label" for="">{{ __('Giá bán lẻ').' ('.config('custom.currency').')' }}</label>
        <div class="col">
            <x-input name="product[price_retail]" 
                :value="$product->price_retail ?? old('product.price_retail')" 
                :placeholder="__('Giá bán lẻ')" 
                data-parsley-type="number" 
                data-parsley-type-message="{{ __('Trường này phải là số.') }}"/>
        </div>
    </div>
    <div class="row ">
        <label class="col-5 col-form-label" for="">{{ __('Giá bán sỉ').' ('.config('custom.currency').')' }}</label>
        <div class="col">
            <x-input name="product[price_wholesale]" 
                :value="$product->price_wholesale ?? old('product.price_wholesale')" 
                :placeholder="__('Giá bán sỉ')" 
                data-parsley-type="number" 
                {{-- data-parsley-lt="input[name='product[price_retail]']" --}}
                data-parsley-number-message="Trường này phải là số." 
                {{-- data-parsley-lt-message="Giá bán sỉ phải nhỏ hơn giá bán lẻ." --}}
            />
        </div>
    </div>
</div>