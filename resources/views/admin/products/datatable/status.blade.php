<span @class([
    'badge', App\Enums\Product\ProductStatus::from($status)->badge()
])>{{ App\Enums\Product\ProductStatus::from($status)->description() }}</span>