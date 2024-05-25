<span @class([
    'badge',
    'bg-green-lt' => \App\Enums\Notification\NotificationStatus::Published->value == $status,
])>{{ \App\Enums\Notification\NotificationStatus::getDescription($status) }}</span>
