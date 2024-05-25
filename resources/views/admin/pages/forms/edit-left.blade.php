<div class="col-12 col-md-9">
    <div class="row">
        <!-- name -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Tiêu đề') }}:</label>
                <x-input name="title" :value="$page->title" :required="true" placeholder="{{ __('Tiêu đề') }}" />
            </div>
        </div>
        <!-- slug -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Slug') }}:</label>
                <x-input name="slug" :value="$page->slug" :required="true" readonly placeholder="{{ __('Slug') }}" />
            </div>
        </div>
        <!-- desc -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Nội dung') }}:</label>
                <textarea name="content" class="ckeditor visually-hidden">{{ $page->content }}</textarea>
            </div>
        </div>
        
        <!-- title seo -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Tiêu đề seo') }}:</label>
                <x-input name="title_seo" :value="$page->title_seo" placeholder="{{ __('Tiêu đề seo') }}" />
            </div>
        </div>
        <!-- desc seo -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Thẻ mô tả') }}:</label>
                <textarea class="form-control" name="desc_seo" rows="5">{{ $page->desc_seo }}</textarea>
            </div>
        </div>
    </div>
</div>
