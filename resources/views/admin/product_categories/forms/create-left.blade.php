<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin danh mục') }}</h2>
        </div>
        <div class="row card-body">
            <!-- name -->
            <div class="col-md-12 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên danh mục') }}:</label>
                    <x-input name="name" :value="old('name')" :required="true"
                        placeholder="{{ __('Tên danh mục') }}" />
                </div>
            </div>
            <!-- Danh mục cha -->
            <div class="col-md-12 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Danh mục cha') }}:</label>
                    <x-select class="select2-bs5" name="parent_id">
                        <x-select-option value="" :title="__('Trống')" />
                        @foreach ($product_categories as $product_category)
                            <x-select-option :value="$product_category->id" :title="generate_text_depth_tree($product_category->depth).' '.__($product_category->name)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- position -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Vị trí') }}:</label>
                    <x-input type="number" name="position" :value="old('position', 0)" :required="true" />
                </div>
            </div>
            <!-- is active -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Trạng thái') }}:</label>
                    <x-select class="select2-bs5" name="status" :required="true">
                        @foreach ($status as $key => $item)
                            <x-select-option :value="$key" :title="$item" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- title seo -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tiêu đề seo') }}:</label>
                    <x-input name="title_seo" :value="old('title_seo')" placeholder="{{ __('Tiêu đề seo') }}" />
                </div>
            </div>
            <!-- desc seo -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Thẻ mô tả') }}:</label>
                    <textarea class="form-control" name="desc_seo" rows="5">{{ old('desc_seo') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>