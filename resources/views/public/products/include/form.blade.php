<div class="detail-products">
    <div class="mb-1 fs-4">
        <h1 class="text-uppercase fw-bold title-products lh-base fs-1">{{ __( $product->name . ' (' . $product->unit->description() .') ') }}</h1>
        <div class="d-flex gap-2 align-items-center mb-3">
            <span class="fw-bold fs-1">{{ __(format_price($product->price_promotion) )}}</span>
            <span class="text-muted text-decoration-line-through">{{ __(format_price($product->price) )}}</span>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <span>@lang('Mã sản phẩm'):</span> <span class="ms-1 fw-bold">{{ $product->sku ?? 'Không rõ'}}</span>
        </div>
        <div class="mb-3"> {!! $product->short_desc !!}</div>
        <div class="mb-3 d-flex align-items-center">
            <span
                class="fw-bold">@lang('Tình trạng'):</span><span @class(['badge ms-2', $product->badgeStock()])>{{ $product->labelStock() }}</span>
        </div>
    </div>

    <form action="{{ route('cart.create', ['product_id' => $product->id]) }}" method="post">
        @csrf
        <div class="d-inline-flex gap-2 algin-items-center flex-wrap">
            <div class="input-group" style="width: 150px">
                <button type="button" id="decrement" class="btn input-group-text">-</button>
                <input type="number" id="input" name="quantity" value="0" class="form-control shadow-none">
                <button type="button" id="increment" class="btn input-group-text">+</button>
            </div>
            @if (auth()->check() && auth()->user()->isAgent())
                <div class="d-flex gap-2">
                    <button id="level1" class="btn input-group-text">Chọn số lượng theo chiết khấu cấp 1</button>
                    <button id="level2" class="btn input-group-text">Chọn số lượng theo chiết khấu cấp 2</button>
                </div>
            @endif
            @if (auth()->check() && auth()->user()->isSeller())
                <div class="d-flex gap-2">
                    <button type="button" id="seller_donate" class="btn input-group-text">Tự động chọn số lượng khuyến mãi
                    </button>
                </div>
                <div class="d-flex gap-2 w-100">
                    <p id="message" style="display: block; color: red; font-style: italic;"></p>
                </div>
            @endif
            <div class="d-flex gap-2">
                <button id="addtoCart" type="submit" class="btn btn-outline-cyan fw-bold text-uppercase btn-add-products">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                        <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                    </svg>
                    @lang('Thêm vào giỏ')
                </button>
            </form>
                <a id="buyit" href="{{ route('checkout.index',['product_id' => $product->id]) }}"
                    class="btn btn-outline-danger fw-bold text-uppercase btn-add-to-cart">
                    @lang('Mua ngay')</a>
            </div>
        </div>

    {{--  Script tinh so luong auto cho Đại lý  --}}
    <script>
        function handleClick(event) {
            var pricePromotion = {{ $product->price_promotion }};
            var result;
            if (event.target.id === 'level1') {
                result = Math.round(10000000 / pricePromotion);
            } else if (event.target.id === 'level2') {
                result = Math.round(5000000 / pricePromotion);
            }
            document.getElementById('input').value = result;
        }

        document.getElementById('level1').addEventListener('click', handleClick);
        document.getElementById('level2').addEventListener('click', handleClick);
    </script>

{{--  Tự động chọn số lượng đến mức tặng thêm  --}}
<script>
    function handleClick(event) {
        document.getElementById('input').value = {{ $qty }};
    }
    if ({{ $qty }} === 0) {
        var messageElement = document.getElementById('message');
        messageElement.innerText = 'Sản phẩm này hiện tại chưa có khuyến mãi !!';
    } else {
        var messageElement = document.getElementById('message');
        messageElement.innerText =
            'Mua {{ $qty }} {{ $product->unit->description() }} sẽ được tặng {{ $qty_donate }} {{ $product->unit->description() }} !';
    }
    document.getElementById('seller_donate').addEventListener('click', handleClick);
</script>

<script>

document.addEventListener('DOMContentLoaded', function() {
    hideBtn();
    updateButtonState();
});

function hideBtn() {
    let descrea = document.getElementById('decrement');

    descrea.addEventListener('click', updateButtonState);
    document.getElementById('increment').addEventListener('click', updateButtonState);
}

function updateButtonState() {
    let buy = document.getElementById('buyit');
    let cart = document.getElementById('addtoCart');
    let qty = parseInt(document.getElementById('input').value);

    if (qty === 0) {
        buy.style.pointerEvents = 'none';
        buy.style.opacity = 0.5;
        cart.disabled = true;
    } else {
        buy.style.pointerEvents = 'auto';
        buy.style.opacity = 1;
        cart.disabled = false;
    }
}
</script>


<script>
    document.getElementById('buyit').addEventListener('click', function(event) {
        event.preventDefault();
        var quantity = document.getElementById('input').value;
        var url = this.getAttribute('href') + '&quantity=' + encodeURIComponent(quantity);
        window.location.href = url;
    });
</script>


</div>
