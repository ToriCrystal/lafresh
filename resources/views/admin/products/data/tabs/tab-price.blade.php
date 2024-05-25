<div id="price" class="tab-pane active show p-3" role="tabpanel" aria-labelledby="tabPrice">
    <div class="row mb-3">
        <label class="col-5 col-form-label" for="">{{ __('Giá bán thường').' ('.config('custom.currency').')' }}</label>
        <div class="col">
            <x-input name="product[price]" 
                :required="true"
                :value="$product->price ?? old('product.price')" 
                :placeholder="__('Giá bán thường')" 
                data-parsley-type="number" 
                data-parsley-type-message="{{ __('Trường này phải là số.') }}"/>
        </div>
    </div>
    <div class="row ">
        <label class="col-5 col-form-label" for="">{{ __('Giá khuyến mãi').' ('.config('custom.currency').')' }}</label>
        <div class="col">
            <x-input name="product[price_promotion]" 
                :value="$product->price_promotion ?? old('product.price_promotion')" 
                :placeholder="__('Giá khuyến mãi')" 
                data-parsley-type="number" 
                data-parsley-lt="input[name='product[price]']"
                data-parsley-number-message="Trường này phải là số."
                data-parsley-lt-message="Giá khuyến mãi phải nhỏ hơn giá mặc định."/>
        </div>
    </div>
</div>