<div class="col-12 col-md-3">
    <div class="card">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.modal-delete data-route="{{ route('admin.menu.delete', $menu->id) }}" :title="__('Xóa')" />
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            {{ __('Trạng thái') }}
        </div>
        <div class="card-body p-2">
            <x-select class="form-select" name="menu[status]" :required="true">
                @foreach ($status as $key => $value)
                    <x-select-option :option="$menu->status->value" :value="$key" :title="$value" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>