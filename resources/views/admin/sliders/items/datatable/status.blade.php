<span @class([
    'badge',
    App\Enums\Slider\SliderStatus::from($status)->badge(),
])>{{ \App\Enums\Slider\SliderStatus::getDescription($status) }}</span>