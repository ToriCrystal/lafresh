<div class="col-12 position-sticky" style="top: 20px">
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title title-text pb-2 border-bottom">Thông tin đơn hàng</h2>
            <h3 class="fw-bold d-flex justify-content-between pb-2">Sản phẩm:
                <span class="products-name text-danger fs-2">
                    ROCKY LENS ASP BLUECUT SHMC 1.67
                </span>
            </h3>
            <h3 class="fw-bold d-flex justify-content-between pb-2">Số lượng:
                <span class="total-quantity text-danger fs-2">
                    150 miếng
                </span>
            </h3>
            <h3 class="fw-bold d-flex justify-content-between pb-2">Tổng tiền: <span
                    class="total-cart text-danger fs-2">
                    5.000.000
                    <sup>đ</sup></span>
            </h3>
            <span>Phí vận chuyển sẽ được tính ở trang thanh toán. <br>Bạn cũng có thể nhập mã
                giảm giá ở trang
                thanh toán.</span>
            <a href="{{ route('checkout.index') }}" class="btn btn-danger w-100 text-uppercase my-3">Thanh
                toán</a>
            <a href="{{ route('product.index') }}" class="title-text text-decoration-none text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                </svg>
                Tiếp tục mua hàng
            </a>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title title-text pb-2 border-bottom">Ghi chú đơn hàng</h2>
            <textarea name="#" id="#" cols="30" rows="10" class="form-control shadow-none"
                placeholder="Ghi chú cho tài xế hoặc cửa hàng về thời gian giao nhận sản phẩm.."></textarea>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title title-text pb-2 border-bottom">Chính sách mua hàng</h2>
            <div class="policy">
                <ul class="list-unstyled">
                    <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                    <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                    <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống.</li>
                    <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ
                        thống.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>