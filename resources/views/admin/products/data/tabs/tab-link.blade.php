<div id="btnLink" class="tab-pane p-3" role="tabpanel" aria-labelledby="tabBtnLink">
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Brochure') }}:</label>
                <x-input-file-ckfinder name="product[brochure]" :value="$product->brochure ?? old('product.brochure', '#')" />
            </div>
            <div class="mb-3">
                <label class="control-label">{{ __('Datasheet') }}:</label>
                <x-input-file-ckfinder name="product[datasheet]" :value="$product->datasheet ?? old('product.datasheet', '#')" />
            </div>
            <div class="mb-3">
                <label class="control-label">{{ __('User manual') }}:</label>
                <x-input-file-ckfinder name="product[user_manual]" :value="$product->user_manual ?? old('product.user_manual', '#')" />
            </div>
        </div>
    </div>
</div>