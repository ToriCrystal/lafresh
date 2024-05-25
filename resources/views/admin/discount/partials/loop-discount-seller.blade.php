<div class="row border p-2 mb-3 item-discount">
    <div class="col-md-8 col-sm-12">
        <label class="form-label">{{ __('Chọn sản phẩm') }}</label>
        <x-select name="product_id[]" :required="true">
            <option>@lang('Chọn sản phẩm')</option>
            @foreach ($products as $key => $value)
                <x-select-option :value="$value->id" :title="$value->name" />
            @endforeach
        </x-select>
    </div>
    <div class="col-md-2 col-sm-12">
        <label class="form-label">{{ __('Số lượng') }}</label>
        <x-input type="number" name="qty[]" value="0" min="0" autocomplete="off"
            :data-parsley-number-message="__('Trường này phải là số.')" :data-parsley-min-message="__('Giá trị phải lớn hơn 0.')" />
    </div>
    <div class="col-md-2 col-sm-12">
        <label class="form-label">{{ __('Tặng') }}</label>
        <x-input type="number" name="qty_donate[]" value="0" min="0"
            autocomplete="off" :data-parsley-number-message="__('Trường này phải là số.')" :data-parsley-min-message="__('Giá trị phải lớn hơn 0.')" />
    </div>
    <div class="col-12 text-end mt-2">
        <x-button type="button"
            class="btn-sm btn-outline-danger btn-delete-item-discount">@lang('Xóa')</x-button>
    </div>
</div>
