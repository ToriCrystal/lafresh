<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.modal-delete data-route="{{ route('admin.product_category.delete', $product_category->id) }}" :title="__('Xóa')" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Hiển thị trang chủ') }}
        </div>
        <div class="card-body p-2">
            <x-select class="select2-bs5" name="show_home" :required="true">
                @foreach ($show_home as $key => $item)
                    <x-select-option :option="$product_category->show_home->value" :value="$key" :title="$item" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Avatar') }}
        </div>
        <div class="card-body p-2">
            <x-input-image-ckfinder name="avatar" showImage="avatar" :value="$product_category->avatar" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Icon') }}
        </div>
        <div class="card-body p-2">
            <x-input-image-ckfinder name="icon" showImage="icon" :value="$product_category->icon" :isEmpty="true"/>
        </div>
    </div>
</div>