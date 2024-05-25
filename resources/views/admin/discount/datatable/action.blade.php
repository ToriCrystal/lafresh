<div class="d-flex justify-content-center gap-1">
    <x-link class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit-discount-seller" id="editDiscountSeller"
     data-id="{{ $id }}" data-url="{{ route('admin.discount.edit.seller', $id) }}">
        <i class="ti ti-edit"></i>
    </x-link>
    <x-button.modal-delete class="btn-icon" data-route="{{ route('admin.discount.delete.seller', $id) }}">
        <i class="ti ti-trash"></i>
    </x-button.modal-delete>
</div>

@include('admin.discount.partials.modal-edit-discount-seller')