<span @class([
    'badge', App\Enums\Category\CategoryStatus::from($status)->badge()
])>{{ App\Enums\Category\CategoryStatus::from($status)->description() }}</span>