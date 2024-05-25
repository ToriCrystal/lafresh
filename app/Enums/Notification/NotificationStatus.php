<?php


namespace App\Enums\Notification;


use App\Support\Enum;


enum NotificationStatus: int
{
    use Enum;

    case Published = 1;
    case Draft = 2;

    public function badge(){
        return match($this) {
            NotificationStatus::Published => 'bg-green',
            NotificationStatus::Draft => 'bg-red',
        };
    }

}
