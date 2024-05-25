<div class="information-orders">
    <div class="card-header mb-3">
        <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#tabs-all-orders" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                    role="tab">
                    Tất cả đơn
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabs-pending" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                    tabindex="-1">

                    Đang xử lí</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabs-delivery" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                    tabindex="-1">
                    Đang vận chuyển</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabs-success" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                    tabindex="-1">

                    Đã giao</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabs-cancel" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                    tabindex="-1">

                    Đã huỷ</a>
            </li>
        </ul>
    </div>
    <div class="mb-3">
        <div class="input-icon mb-3">
            <input type="text" value="" class="form-control" placeholder="Tìm kiếm đơn hàng...">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                </svg>
            </span>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade-in active show" id="tabs-all-orders" role="tabpanel">
                @include('public.auth.include.items')
            </div>
            <div class="tab-pane fade-out" id="tabs-pending" role="tabpanel">
                @include('public.auth.include.status.pending')
            </div>
            <div class="tab-pane fade-in" id="tabs-delivery" role="tabpanel">
                @include('public.auth.include.status.delivery')
            </div>
            <div class="tab-pane fade-out" id="tabs-success" role="tabpanel">
                @include('public.auth.include.status.success')
            </div>
            <div class="tab-pane fade-in" id="tabs-cancel" role="tabpanel">
                @include('public.auth.include.status.cancel')
            </div>
        </div>
    </div>
</div>
