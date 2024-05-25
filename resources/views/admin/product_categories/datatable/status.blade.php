<span @class([
    'badge', App\Enums\ProductCategory\ProductCategoryStatus::from($status)->badge()
])>{{ App\Enums\ProductCategory\ProductCategoryStatus::from($status)->description() }}</span>