<div class="col-md-4 col-12 position-sticky" style="top: 20px">
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title title-text pb-2 border-bottom">Thông tin đơn hàng</h2>
            <h3 class="mb-3"><strong>Họ tên: </strong><span class="fw-normal">Nguyễn Văn A</span></h3>
            <h3 class="mb-3"><strong>Địa chỉ: </strong><span class="fw-normal">998/42/15 Quang Trung, Phường
                    8, Q.Gò Vấp, Hồ
                    Chí
                    Minh, Việt
                    Nam</span></h3>
            <h3 class="mb-3"><strong>Điện thoại: </strong><span class="fw-normal"></span></h3>
            <h3 class="fw-bold d-flex justify-content-between align-items-center pb-2">Tổng tiền <span
                    class="total-cart text-danger fs-2">

                    <sup>đ</sup></span>
                <h3 class="fw-bold d-flex justify-content-between align-items-center pb-2">Trạng thái:
                    <span class="status-cart fw-normal text-danger">
                      
                    </span>
                </h3>
                <a href="{{ route('checkout.index') }}" class="btn btn-danger w-100 text-uppercase my-3"
                    data-bs-toggle="modal" data-bs-target="#modal-danger">Huỷ
                    đơn</a>
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
                    <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
