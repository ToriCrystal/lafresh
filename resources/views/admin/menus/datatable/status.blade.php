<span @class([
    'badge',
    'bg-green-lt' => \App\Enums\DefaultStatus::Published == $status,
])>{{ \App\Enums\DefaultStatus::getDescription($status) }}</span>