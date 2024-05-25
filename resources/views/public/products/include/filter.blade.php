<div class="container">
    <x-form :action="route('product.index')" type="get">
        <x-select onchange="this.form.submit()" name="sort" class="w-auto shadow-none ms-auto">
            @foreach (config('custom.product.sort') as $key => $title)
                <x-select-option :option="request()->input('sort')" :value="$key" :title="$title" />
            @endforeach
        </x-select>
    </x-form>
    <div class="new_filter my-3 d-flex flex-wrap justify-content-lg-between justify-content-between p-3">
        <div class="filter_column" id="filter-type">
            <h2 class="my-3 title-text">Loại kính</h2>
            <div class="list_filter mt-3">
                <div data-filter="(product_type:product=BlueCut)">
                    <a href="#" class="nav-link">BlueCut</a>
                </div>
                <div data-filter="(product_type:product=Đổi Màu Trendy)">
                    <a href="#" class="nav-link">Đổi Màu Trendy</a>
                </div>
            </div>
        </div>

        <div class="filter_column" id="filter-lop-phu">
            <h2 class="my-3 title-text">Lớp phủ</h2>
            <div class="list_filter mt-3">
                <div data-filter="(tag:product**Elite)" data-map-1="BlueCut, Đổi Màu Trendy">
                    <a href="#" class="nav-link">Elite</a>
                </div>
                <div data-filter="(tag:product**Saphir)" data-map-1="Đổi Màu Trendy, BlueCut">
                    <a href="#" class="nav-link">Saphir</a>
                </div>
            </div>
        </div>

        <div class="filter_column" id="filter-chiet-xuat">
            <h2 class="my-3 title-text">Chiết xuất</h2>
            <div class="list_filter mt-3">
                <div data-filter="(tag:product**1.56)" data-map-1="BlueCut, Đổi Màu Trendy">
                    <a href="#" class="nav-link">1.56</a>
                </div>
                <div data-filter="(tag:product**1.67)" data-map-1="BlueCut">
                    <a href="#" class="nav-link">1.67</a>
                </div>
            </div>
        </div>


        <div class="filter_column" id="filter-color">
            <h2 class="my-3 title-text">Màu sắc</h2>
            <div class="list_filter mt-3">
                <div class="d-flex flex-row gap-3">
                    <div class="d-flex flex-column">
                        <div data-filter="(tag:product**Nâu)" data-map-1="Đổi Màu Trendy">
                            <a href="#" class="nav-link">Nâu</a>
                        </div>
                        <div data-filter="(tag:product**Vàng cam)" data-map-1="Đổi Màu Trendy">
                            <a href="#" class="nav-link">Vàng cam</a>
                        </div>
                        <div data-filter="(tag:product**Tím)" data-map-1="Đổi Màu Trendy">
                            <a href="#" class="nav-link">Tím</a>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div data-filter="(tag:product**Xanh dương)" data-map-1="Đổi Màu Trendy">
                            <a href="#" class="nav-link">Xanh dương</a>
                        </div>
                        <div data-filter="(tag:product**Hồng)" data-map-1="Đổi Màu Trendy">
                            <a href="#" class="nav-link">Hồng</a>
                        </div>
                        <div data-filter="(tag:product**Xanh lá)" data-map-1="Đổi Màu Trendy">
                            <a href="#" class="nav-link">Xanh lá</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
