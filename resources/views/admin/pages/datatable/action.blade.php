
@if(auth('admin')->user()->isSuperAdmin())
<x-button.modal-delete class="btn-icon" data-route="{{ route('admin.page.delete', $id) }}">
    <i class="ti ti-trash"></i>
</x-button.modal-delete>
@endif