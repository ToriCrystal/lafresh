<aside class="col-md-3 categories">
    <div class="p-3 border border-5 rounded-1 bg-white">

        <div class="p-2 border-bottom my-3">
            <h3 class="fw-bold text-uppercase title-color">Danh mục sản phẩm</h3>
            <ul class="list-unstyled">
                <li class="py-1"><input type="checkbox"> Kim loại cao cấp</li>
                <li class="py-1"><input type="checkbox"> Nhựa acetate</li>
                <li class="py-1"><input type="checkbox"> Nhựa cao cấp</li>
                <li class="py-1"><input type="checkbox"> Thép</li>
                <li class="py-1"><input type="checkbox"> Titan</li>
            </ul>
        </div>

        <div class="p-2 border-bottom my-3">
            <h3 class="fw-bold text-uppercase title-color">Giá</h3>
            <div id="slider-range"></div>
            <div class="mt-3 d-flex flex-row align-items-center justify-content-center gap-3">
                <strong id="selected-range"></strong>
                <a href="#" class="btn btn-primary w-auto text-uppercase">Lọc</a>
            </div>
        </div>

        <hr>

        <div class="p-2">
            <h3 class="fw-bold text-uppercase title-color pb-3">Sản phẩm vừa xem</h3>
            <div class="product-last-seen">
                <span class="title-product title-color text-uppercase fst-italic">Gọng kính Eye Plus 9812 C11
                    Đen</span>
                <span class="price-product"><del>280.000 ₫</del></span>
                <span class="sale-price-product fw-bold" style="color: red;">280.000 ₫</span>
                <img src="{{ asset('public/assets/images/product_1.jpg') }}" alt=""
                    class="img-product img-fluid" width="25%">
            </div>
            <hr>
            <div class="product-last-seen">
                <span class="title-product title-color text-uppercase fst-italic">Gọng kính Eye Plus 9812 C11
                    Đen</span>
                <span class="price-product"><del>280.000 ₫</del></span>
                <span class="sale-price-product fw-bold" style="color: red;">280.000 ₫</span>
                <img src="{{ asset('public/assets/images/product_1.jpg') }}" alt=""
                    class="img-product img-fluid" width="25%">
            </div>

        </div>
    </div>
</aside>
