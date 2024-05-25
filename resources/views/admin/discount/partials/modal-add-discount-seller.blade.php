<div class="modal modal-blur fade" id="modal-add-discount-seller" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Thêm chiết khấu')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-form :action="route('admin.discount.seller.store')" type="post" :validate="true">
                    <div id="wrapLoopDiscountSeller" class="">
                        @include('admin.discount.partials.loop-discount-seller', ['products' => $products])
                    </div>

                    <div class="text-end mt-3">
                        <x-button type="button" id="btnAddDiscountSeller" class="btn-sm btn-primary"><i
                                class="ti ti-plus"></i> @lang('Thêm')</x-button>
                        <x-button type="submit" id="save" class="btn-sm btn-primary d-none"></x-button>
                    </div>
                </x-form>
            </div>
            <hr>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">@lang('Thoát')</button>
                <button type="button" onclick="document.getElementById('save').click()" class="btn btn-primary"
                    data-bs-dismiss="modal">@lang('Lưu')</button>
            </div>
        </div>
    </div>
</div>
