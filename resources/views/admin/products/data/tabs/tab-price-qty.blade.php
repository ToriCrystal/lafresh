<div id="priceQty" class="tab-pane show p-3" role="tabpanel" aria-labelledby="tabPrice">
    <div id="wrapLoopPurchaseQty" class="">
        @isset($product)
            @foreach ($product->purchase_qty as $purchase_qty)
                @include('admin.products.data.partials.loop-purchase-qty', [
                    'purchase_qty' => $purchase_qty
                ])
            @endforeach
        @endisset
    </div>
    <div class="text-end">
        <x-button type="button" id="btnAddPurchaseQty" class="btn-sm btn-primary"><i class="ti ti-plus"></i> @lang('Thêm')</x-button>
    </div>
</div>