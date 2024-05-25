<div id="extraContent" class="tab-pane p-3" role="tabpanel" aria-labelledby="tabExtraContent">
    <div class="row">
        <!-- desc -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabContentSpecification" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">@lang('Đặc điểm kỹ thuật')</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabContentAppication" class="nav-link" data-bs-toggle="tab" aria-selected="true" role="tab">@lang('Ứng dụng')</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabContentDownload" class="nav-link" data-bs-toggle="tab" aria-selected="true" role="tab">@lang('Download')</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabContentSpecification" role="tabpanel">
                            <textarea name="product[content_specification]" class="ckeditor visually-hidden">{{ $product->content_specification ?? old('product.content_specification') }}</textarea>
                        </div>
                        <div class="tab-pane" id="tabContentAppication" role="tabpanel">
                            <textarea name="product[content_application]" class="ckeditor visually-hidden">{{ $product->content_application ?? old('product.content_application') }}</textarea>
                        </div>
                        <div class="tab-pane" id="tabContentDownload" role="tabpanel">
                            <textarea name="product[content_download]" class="ckeditor visually-hidden">{{ $product->content_download ?? old('product.content_download') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>