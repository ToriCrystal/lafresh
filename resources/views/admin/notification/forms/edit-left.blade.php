<div class="col-12 col-md-8">
    <div class="row">
        <!-- title -->
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Title'):</label>
                    <span class="float-end text-yellow" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="{{ __('Title') }}">
                        <i class="ti ti-bell"></i>
                    </span>
                </div>
                <div class="card-body p-2">
                    <x-input name="title" :value="$notify->title" :required="true" placeholder="{{ __('Tiêu đề') }}" />
                </div>
            </div>
        </div>
        <!-- desc -->
        <div class="col-md-12 col-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <label class="control-label col-form-label p-0">@lang('Nội Dung'):</label>
                    <i class="ti ti-book"></i>
                </div>
                <div class="card-body p-2">
                    <textarea name="desc" class="ckeditor visually-hidden">{{ $notify->desc }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

