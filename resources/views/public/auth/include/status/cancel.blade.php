<div class="card mb-3">
    <div class="card-status-bottom bg-danger"></div>
    <div class="card-header">
        <h3 class="card-title d-flex flex-row align-items-center text-danger">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 7l16 0" />
                <path d="M10 11l0 6" />
                <path d="M14 11l0 6" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
            </svg>
            <span class="px-2">Đã huỷ</span>
        </h3>
    </div>
    <div class="card-body">
        <div class="row row-0 align-items-center my-3">
            <div class="col-md-2 col-12">
                <img src="{{ asset('/assets/images/product_1.jpg') }}" class="w-100 object-cover card-img-center"
                    alt="Product">
            </div>
            <div class="col-md-10 col-12">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <h3 class="card-title title-text d-flex flex-row gap-3 mb-2 align-items-center"> TRÒNG ROCKY
                            LENSASP BLUECUT, SHMC
                            1.67<p class="text-dark quantity m-0">x2</p>
                        </h3>
                        <div class="d-flex flex-row gap-3 justify-content-between align-items-center flex-wrap">
                            <div class="d-flex flex-column">
                                <span class="title-text">Mắt trái</span>
                                <ul class="list-unstyled">
                                    <li><strong class="px-2">Độ cầu:</strong>+2.00</li>
                                    <li><strong class="px-2">Độ loạn:</strong>-1.50</li>
                                </ul>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="title-text">Mắt phải</span>
                                <ul class="list-unstyled">
                                    <li><strong class="px-2">Độ cầu:</strong>+2.00</li>
                                    <li><strong class="px-2">Độ loạn:</strong>-1.50</li>
                                </ul>
                            </div>
                            <p class="total fw-bold">580.000 <sup>đ</sup></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mb-3"></div>
        <div class="d-flex flex-row justify-content-between align-items-center">
            <a href="{{ route('cart.detail') }}" class="btn btn-outline-secondary">Chi tiết đơn hàng</a>
            <span>Tổng tiền <span><strong>580.000 <sup>
                            đ</sup></strong></span></span>
        </div>
    </div>
</div>
