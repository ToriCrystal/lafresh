<div class="col-12 col-md-9">
    <div class="row">
        <!-- name -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Tên sản phẩm') }}:</label>
                <x-input name="product[name]" :value="$product->name" :required="true" placeholder="{{ __('Tên sản phẩm') }}" />
            </div>
        </div>
        <!-- slug -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Slug') }}:</label>
                <x-input name="product[slug]" :value="$product->slug" :required="true" placeholder="{{ __('Slug') }}" />
            </div>
        </div>
        <!-- name -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Mô tả') }}:</label>
                <textarea name="product[desc]" class="ckeditor visually-hidden">{!! $product->desc !!}</textarea>
            </div>
        </div>
        <!-- short_desc -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Mô tả ngắn') }}:</label>
                <textarea name="product[short_desc]" class="form-control" rows="4">{{ $product->short_desc }}</textarea>
            </div>
        </div>
        <!-- data -->
        <div class="col-12 mb-3">
            @include('admin.products.data.data-product')
        </div>
        <!-- title seo -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Tiêu đề seo') }}:</label>
                <x-input name="product[title_seo]" :value="$product->title_seo" placeholder="{{ __('Tiêu đề seo') }}" />
            </div>
        </div>
        <!-- desc seo -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Thẻ mô tả') }}:</label>
                <textarea class="form-control" name="product[desc_seo]" rows="5">{{ $product->desc_seo }}</textarea>
            </div>
        </div>
    </div>
</div>
