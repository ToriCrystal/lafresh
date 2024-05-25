<section class="product-section py-3" id="product_section">
    <div class="container">
        <div class="hr-text">
            <h2 class="text-uppercase fw-bold title-section py-3 text-dark">Sản phẩm nổi bật</h2>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-9 col-12">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach($products as $key => $product)
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $key + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($products as $key => $product)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="row justify-content-center flex-row py-5">
                                    <div class="col-6">
                                        <img src="{{asset($product->avatar) }}" alt="Product Avatar">
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex flex-column">
                                            <h2 class="product-title">{{$product->name}}</h2>
                                            <div id="sku_pro"><strong>SKU:</strong>{{$product->sku}}</div>
                                            <div class="product-desc">
                                                {!! $product->desc !!}
                                                <a href="{{ route('product.show') }}"
                                                    class="btn btn-outline-danger">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="carousel-item active">
                                <div class="row justify-content-center flex-row py-5">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/images/product_1.jpg') }}" class="d-block" alt="..."
                                            width="100%">
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex flex-column">
                                            <h2 class="product-title">TRÒNG ROCKY LUXURY ASP BLUECUT SHMC 1.61</h2>
                                            <div id="sku_pro"><strong>SKU:</strong>ASX-02</div>
                                            <div class="product-desc">
                                                <ul>
                                                    <li>Hạn chế chói ưu việt</li>
                                                    <li>Mỏng nhẹ 15-20%</li>
                                                    <li>Ngăn ánh sáng xanh có hại</li>
                                                    <li>Bảo vệ mắt khỏi tia UV</li>
                                                    <li>Tầm nhìn dễ chịu khi lái xe ban đêm</li>
                                                    <li>Hạn chế vân tay bụi bẩn, bám nước, trầy xước</li>
                                                    <li>Thiết kế phẳng ASP: Mỏng nhẹ, tối ưu hoá tầm nhìn</li>
                                                </ul>
                                                <a href="{{ route('products.show') }}"
                                                    class="btn btn-outline-danger">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center flex-row py-5">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/images/product_2.jpg') }}" class="d-block" alt="..."
                                            width="100%">
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex flex-column">
                                            <h2 class="product-title">TRÒNG ROCKY LUXURY ASP BLUECUT SHMC 1.61</h2>
                                            <div id="sku_pro"><strong>SKU:</strong>ASX-02</div>
                                            <div class="product-desc">
                                                <ul>
                                                    <li>Hạn chế chói ưu việt</li>
                                                    <li>Mỏng nhẹ 15-20%</li>
                                                    <li>Ngăn ánh sáng xanh có hại</li>
                                                    <li>Bảo vệ mắt khỏi tia UV</li>
                                                    <li>Tầm nhìn dễ chịu khi lái xe ban đêm</li>
                                                    <li>Hạn chế vân tay bụi bẩn, bám nước, trầy xước</li>
                                                    <li>Thiết kế phẳng ASP: Mỏng nhẹ, tối ưu hoá tầm nhìn</li>
                                                </ul>
                                                <a href="{{ route('products.show') }}"
                                                    class="btn btn-outline-danger">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center flex-row py-5">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/images/product_3.jpg') }}" class="d-block" alt="..."
                                            width="100%">
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex flex-column">
                                            <h2 class="product-title">TRÒNG ROCKY LUXURY ASP BLUECUT SHMC 1.61</h2>
                                            <div id="sku_pro"><strong>SKU:</strong>ASX-02</div>
                                            <div class="product-desc">
                                                <ul>
                                                    <li>Hạn chế chói ưu việt</li>
                                                    <li>Mỏng nhẹ 15-20%</li>
                                                    <li>Ngăn ánh sáng xanh có hại</li>
                                                    <li>Bảo vệ mắt khỏi tia UV</li>
                                                    <li>Tầm nhìn dễ chịu khi lái xe ban đêm</li>
                                                    <li>Hạn chế vân tay bụi bẩn, bám nước, trầy xước</li>
                                                    <li>Thiết kế phẳng ASP: Mỏng nhẹ, tối ưu hoá tầm nhìn</li>
                                                </ul>
                                                <a href="{{ route('products.show') }}"
                                                    class="btn btn-outline-danger">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center flex-row py-5">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/images/product_4.jpg') }}" class="d-block" alt="..."
                                            width="100%">
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex flex-column">
                                            <h2 class="product-title">TRÒNG ROCKY LUXURY ASP BLUECUT SHMC 1.61</h2>
                                            <div id="sku_pro"><strong>SKU:</strong>ASX-02</div>
                                            <div class="product-desc">
                                                <ul>
                                                    <li>Hạn chế chói ưu việt</li>
                                                    <li>Mỏng nhẹ 15-20%</li>
                                                    <li>Ngăn ánh sáng xanh có hại</li>
                                                    <li>Bảo vệ mắt khỏi tia UV</li>
                                                    <li>Tầm nhìn dễ chịu khi lái xe ban đêm</li>
                                                    <li>Hạn chế vân tay bụi bẩn, bám nước, trầy xước</li>
                                                    <li>Thiết kế phẳng ASP: Mỏng nhẹ, tối ưu hoá tầm nhìn</li>
                                                </ul>
                                                <a href="{{ route('products.show') }}"
                                                    class="btn btn-outline-danger">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center flex-row py-5">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/images/product_5.jpg') }}" class="d-block" alt="..."
                                            width="100%">
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex flex-column">
                                            <h2 class="product-title">TRÒNG ROCKY LUXURY ASP BLUECUT SHMC 1.61</h2>
                                            <div id="sku_pro"><strong>SKU:</strong>ASX-02</div>
                                            <div class="product-desc">
                                                <ul>
                                                    <li>Hạn chế chói ưu việt</li>
                                                    <li>Mỏng nhẹ 15-20%</li>
                                                    <li>Ngăn ánh sáng xanh có hại</li>
                                                    <li>Bảo vệ mắt khỏi tia UV</li>
                                                    <li>Tầm nhìn dễ chịu khi lái xe ban đêm</li>
                                                    <li>Hạn chế vân tay bụi bẩn, bám nước, trầy xước</li>
                                                    <li>Thiết kế phẳng ASP: Mỏng nhẹ, tối ưu hoá tầm nhìn</li>
                                                </ul>
                                                <a href="{{ route('products.show') }}"
                                                    class="btn btn-outline-danger">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <div class="cicrle-button">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </div>

                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <div class="cicrle-button">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>