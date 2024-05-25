<div class="card product-data">
    <div class="card-body p-0">
        <div class="row g-0">
            <div class="col-12 col-md-3 border-end wrap-nav">
                @include('admin.products.data.tabs.tab-nav')
            </div>
            <div class="col-12 col-md-9 ps-0">
                <div id="tabDataProductContent" class="tab-content">
                    @include('admin.products.data.tabs.tab-price')
                    @include('admin.products.data.tabs.tab-price-qty')
                    @include('admin.products.data.tabs.tab-inventory')
                    @include('admin.products.data.tabs.tab-link')
                    @include('admin.products.data.tabs.tab-extra-content')
                </div>
            </div>
        </div>
    </div>
</div>