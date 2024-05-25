<ul id="tabDataProduct" class="nav nav-pills flex-column" role="tablist">
    <li class="nav-item type-simple">
        <button type="button" id="tabPrice" class="nav-link gap-2 align-items-center active w-100" data-bs-toggle="tab" data-bs-target="#price" role="tab" aria-controls="price" aria-selected="true">
            <i class="ti ti-premium-rights"></i> {{ __('Giá sản phẩm') }}
        </button>
    </li>
    <li class="nav-item type-simple">
        <button type="button" id="tabPriceQty" class="nav-link gap-2 align-items-center w-100" data-bs-toggle="tab" data-bs-target="#priceQty" role="tab" aria-controls="priceQty" aria-selected="true">
            <i class="ti ti-premium-rights"></i> {{ __('Mua theo SL') }}
        </button>
    </li>
    <li class="nav-item type-any">
        <button type="button" id="tabInventory" class="nav-link align-items-center gap-2 w-100" data-bs-toggle="tab" data-bs-target="#inventory"  aria-controls="inventory" aria-selected="false">
            <i class="ti ti-building-warehouse"></i> {{ __('Kiểm kê kho hàng') }}
        </button>
    </li>
    <li class="nav-item type-any">
        <button type="button" id="tabBtnLink" class="nav-link align-items-center gap-2 w-100" data-bs-toggle="tab" data-bs-target="#btnLink"  aria-controls="btnLink" aria-selected="false">
            <i class="ti ti-article"></i> {{ __('Link') }}
        </button>
    </li>
    <li class="nav-item type-any">
        <button type="button" id="tabExtraContent" class="nav-link align-items-center gap-2 w-100" data-bs-toggle="tab" data-bs-target="#extraContent"  aria-controls="extraContent" aria-selected="false">
            <i class="ti ti-article"></i> {{ __('Nội dung bổ sung') }}
        </button>
    </li>
</ul>
