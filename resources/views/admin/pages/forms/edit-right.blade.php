<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            @if(auth('admin')->user()->isSuperAdmin())
                <x-button.modal-delete data-route="{{ route('admin.page.delete', $page->id) }}" :title="__('Xóa')" />
            @endif
        </div>
    </div>
</div>