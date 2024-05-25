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
                    <x-input name="name" :value="$product_category->name" :required="true"
                        placeholder="{{ __('Tên danh mục') }}" />
                </div>
            </div>
            <!-- slug -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Slug') }}:</label>
                    <x-input name="slug" :value="$product_category->slug" :required="true" placeholder="{{ __('Slug') }}" />
                </div>
            </div>
            <!-- Danh mục cha -->
            <div class="col-md-12 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Danh mục cha') }}:</label>
                    <x-select class="select2-bs5" name="parent_id">
                        <x-select-option value="" :title="__('Trống')" />
                        @foreach ($product_categories as $item)
                            <x-select-option :option="$product_category->parent_id" :value="$item->id" :title="generate_text_depth_tree($item->depth).' '.__($item->name)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- position -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Vị trí') }}:</label>
                    <x-input type="number" name="position" :value="$product_category->position" :required="true" />
                </div>
            </div>
            <!-- is active -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Trạng thái') }}:</label>
                    <x-select class="select2-bs5" name="status" :required="true">
                        @foreach ($status as $key => $item)
                            <x-select-option :option="$product_category->status" :value="$key" :title="$item" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- title seo -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tiêu đề seo') }}:</label>
                    <x-input name="title_seo" :value="$product_category->title_seo" placeholder="{{ __('Tiêu đề seo') }}" />
                </div>
            </div>
            <!-- desc seo -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Thẻ mô tả') }}:</label>
                    <textarea class="form-control" name="desc_seo" rows="5">{{ $product_category->desc_seo }}</textarea>
                </div>
            </div>
            <!-- permission -->
            <div class="col-12 col-md-12">
                <div class="mb-3">
                    <label for="">{{ __('Giao quyền') }}:</label>
                    <x-select class="select2-bs5-ajax" name="admin_id[]" multiple="multiple">
                        @foreach ($product_category->admins as $item)
                            <x-select-option selected="true" :value="$item->id" :title="$item->fullname.' - '.$item->phone"/>
                        @endforeach
                    </x-select>
                </div>
            </div>
        </div>
    </div>
</div>