<div class="col-md-4 col-12 position-sticky" style="top: 20px">
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title title-text pb-2 border-bottom">Thông tin đơn hàng</h2>
            <h3 class="fw-bold d-flex justify-content-between pb-2">Tổng tiền:
                <span class="total-cart text-danger fs-2">{{ format_price($totalPrice) }}<sup>đ</sup></span>
            </h3>

            <div class="row">
                <a href="{{ route('checkout.index', ['user_id' => $users]) }}"
                    class="btn btn-danger w-100 text-uppercase my-3">Thanh
                    toán</a>
                <a href="{{ route('product.index') }}" class="title-text text-decoration-none text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                    </svg>
                    Tiếp tục mua hàng
                </a>
            </div>
        </div>
    </div>
</div>
