<span @class([
    'badge', App\Enums\Product\ProductInStock::from($in_stock)->badge()
])>{{ App\Enums\Product\ProductInStock::from($in_stock)->description() }}</span>