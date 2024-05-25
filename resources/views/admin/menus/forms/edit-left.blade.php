<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-body">
            <!-- name -->
            <div class="">
                <label class="control-label">{{ __('Tên') }}:</label>
                <x-input name="menu[name]" :value="$menu->name" :required="true" placeholder="{{ __('Tên') }}" />
            </div>
        </div>
    </div>
    <div class="row row-cards mt-3">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                    <a href="#page"
                        class="d-flex justify-content-between w-100 align-items-center text-decoration-none"
                        data-bs-toggle="collapse" data-parent="#accordion" aria-expanded="true">
                        <h4 class="mb-0 text-black">@lang('Trang')</h4>
                        <button type="button" class="btn-action">
                            <span class="icon-tabler-wrapper icon-sm">
                                <i class="ti ti-chevron-down"></i>
                            </span>
                        </button>
                    </a>
                </div>
                <div id="page" class="panel-collapse collapse show">
                    <div class="card-body wrap-list-checkbox">
                        @foreach ($pages as $item)
                            <x-input-checkbox :depth="$item->depth" class="input-add-menu-item" name="add_menu_item"
                                :label="$item->title" :value="$item->id" :data-title="$item->title" :data-reference-type="get_class($item)"
                                :data-titletype="trans('Trang')" />
                        @endforeach
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-add-item btn-icon p-2" data-target="#page"><i
                                class="ti ti-plus"></i>{{ __('Thêm vào menu') }}</button>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <a href="#catP"
                        class="d-flex justify-content-between w-100 align-items-center text-decoration-none"
                        data-bs-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                        <h4 class="mb-0 text-black">@lang('Danh mục')</h4>
                        <button type="button" class="btn-action">
                            <span class="icon-tabler-wrapper icon-sm">
                                <i class="ti ti-chevron-down"></i>
                            </span>
                        </button>
                    </a>
                </div>
                <div id="catP" class="panel-collapse collapse">
                    <div class="card-body wrap-list-checkbox">
                        @foreach ($cat_p as $item)
                            <x-input-checkbox :depth="$item->depth" class="input-add-menu-item" name="add_menu_item"
                                :label="$item->name" :value="$item->id" :data-title="$item->name" :data-reference-type="get_class($item)"
                                :data-titletype="trans('Danh mục')" />
                        @endforeach
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-add-item btn-icon p-2" data-target="#catP"><i
                                class="ti ti-plus"></i>{{ __('Thêm vào menu') }}</button>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <a href="#catPost"
                        class="d-flex justify-content-between w-100 align-items-center text-decoration-none"
                        data-bs-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                        <h4 class="mb-0 text-black">@lang('Chuyên mục')</h4>
                        <button type="button" class="btn-action">
                            <span class="icon-tabler-wrapper icon-sm">
                                <i class="ti ti-chevron-down"></i>
                            </span>
                        </button>
                    </a>
                </div>
                <div id="catPost" class="panel-collapse collapse">
                    <div class="card-body wrap-list-checkbox">
                        @foreach ($cat_post as $item)
                            <x-input-checkbox :depth="$item->depth" class="input-add-menu-item" name="add_menu_item"
                                :label="$item->name" :value="$item->id" :data-title="$item->name" :data-reference-type="get_class($item)"
                                :data-titletype="trans('Chuyên mục')" />
                        @endforeach
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-add-item btn-icon p-2" data-target="#catPost"><i
                                class="ti ti-plus"></i>{{ __('Thêm vào menu') }}</button>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <a href="#customLink"
                        class="d-flex justify-content-between w-100 align-items-center text-decoration-none"
                        data-bs-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                        <h4 class="mb-0 text-black">@lang('Tùy chỉnh')</h4>
                        <button type="button" class="btn-action">
                            <span class="icon-tabler-wrapper icon-sm">
                                <i class="ti ti-chevron-down"></i>
                            </span>
                        </button>
                    </a>
                </div>
                <div id="customLink" class="panel-collapse collapse">
                    <div class="card-body field-custom-link">
                        <div class="mb-3">
                            <label for="">@lang('Tiêu đề'):</label>
                            <x-input name="custom_link_title" placeholder="{{ __('Tiêu đề') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="">@lang('Url'):</label>
                            <x-input name="custom_link_url" value="/" placeholder="{{ __('Đường dẫn') }}" />
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-add-item-custom-link btn-icon p-2"
                            data-target="#customLink">
                            <i class="ti ti-plus"></i>{{ __('Thêm vào menu') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @lang('Cấu trúc menu')
                    </h4>
                </div>
                <div class="card-body">
                    <div class="dd">
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="card-title">
                        @lang('Cài đặt menu')
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p><i>@lang('Vị trí hiển thị')</i></p>
                        </div>
                        <div class="col-md-8">
                            @foreach ($menu_locations as $key => $label)
                                <x-input-checkbox name="locations[]" :checked="$menu->locations->pluck('location')->toArray()" :label="$label"
                                    :value="$key" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
