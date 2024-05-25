<div class="modal modal-blur fade" id="modal-edit-discount-seller" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Sửa chiết khấu')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <x-form :action="route('admin.discount.update.seller')" type="put" :validate="true">
                <x-input type="hidden" name="id" />
                <div class="modal-body">
                    <div class="row border p-2 item-discount">
                        <div class="col-md-8 col-sm-12">
                            <label class="form-label">{{ __('Sản phẩm') }}</label>
                            <x-input name="product_name" readonly />
                            <x-input type="hidden" name="product_id" id="product_id" />
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label class="form-label">{{ __('Số lượng') }}</label>
                            <x-input type="number" name="qty" value="0" min="0" autocomplete="off"
                                :data-parsley-number-message="__('Trường này phải là số.')" :data-parsley-min-message="__('Giá trị phải lớn hơn 0.')" />
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label class="form-label">{{ __('Tặng') }}</label>
                            <x-input type="number" name="qty_donate" value="0" min="0" autocomplete="off"
                                :data-parsley-number-message="__('Trường này phải là số.')" :data-parsley-min-message="__('Giá trị phải lớn hơn 0.')" />
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">@lang('Thoát')</button>
                    <button type="submit" class="btn btn-primary"
                        data-bs-dismiss="modal">@lang('Lưu')</button>
                </div>
            </x-form>
        </div>
    </div>
</div>
