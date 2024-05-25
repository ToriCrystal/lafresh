<div class="col-12 col-md-9">
    <div class="row">
        <!-- name -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Tiêu đề') }}:</label>
                <x-input name="title" :value="$post->title" :required="true" placeholder="{{ __('Tiêu đề') }}" />
            </div>
        </div>
        <!-- slug -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Slug') }}:</label>
                <x-input name="slug" :value="$post->slug" :required="true" placeholder="{{ __('Slug') }}" />
            </div>
        </div>
        <!-- desc -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Mô tả') }}:</label>
                <textarea name="content" class="ckeditor visually-hidden">{{ $post->content }}</textarea>
            </div>
        </div>
        <!-- excerpt -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Mô tả ngắn') }}:</label>
                <textarea class="form-control" name="excerpt" rows="5">{{ $post->excerpt }}</textarea>
            </div>
        </div>
        <!-- title seo -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Tiêu đề seo') }}:</label>
                <x-input name="title_seo" :value="$post->title_seo" placeholder="{{ __('Tiêu đề seo') }}" />
            </div>
        </div>
        <!-- desc seo -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Thẻ mô tả') }}:</label>
                <textarea class="form-control" name="desc_seo" rows="5">{{ $post->desc_seo }}</textarea>
            </div>
        </div>
    </div>
</div>
