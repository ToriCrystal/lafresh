<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2">
            <x-button.submit :title="__('Thêm')" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đơn vị tính') }}
        </div>
        <div class="card-bory p-2">
            <div class="mb-3">
                @foreach ($unit as $key => $value)
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="product[unit]" value="{{ $key }}" required>
                        <span class="form-check-label">{{ $value }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Danh mục') }}
        </div>
        <div class="card-body p-2 wrap-list-checkbox">
            @foreach ($product_categories as $product_category)
                <x-input-checkbox :depth="$product_category->depth" name="categories_id[]" :label="$product_category->name" :value="$product_category->id" />
            @endforeach
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Trạng thái') }}
        </div>
        <div class="card-body p-2">
            <x-select class="select2-bs5" name="product[status]" :required="true">
                @foreach ($status as $key => $item)
                    <x-select-option :value="$key" :title="$item" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Nổi bậc') }}
        </div>
        <div class="card-body p-2">
            <x-select class="select2-bs5" name="product[feature]" :required="true">
                @foreach ($feature as $key => $item)
                    <x-select-option :value="$key" :title="$item" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Hàng mới') }}
        </div>
        <div class="card-body p-2">
            <x-select class="select2-bs5" name="product[new]" :required="true">
                @foreach ($new as $key => $item)
                    <x-select-option :value="$key" :title="$item" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Ảnh đại diện') }}
        </div>
        <div class="card-body p-2">
            <x-input-image-ckfinder name="product[feature_image]" showImage="featureImage" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Thư viện ảnh') }}
        </div>
        <div class="card-body p-2">
            <x-input-gallery-ckfinder name="product[gallery]" type="multiple" />
        </div>
    </div>
</div>
