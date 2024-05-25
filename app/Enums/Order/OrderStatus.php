<?php

namespace App\Enums\Order;

use App\Support\Enum;

enum OrderStatus: int
{
    use Enum;

    case Unprocessed = 1;
    case Processing = 2;
    case Completed = 3;
    case Cancelled = 4;

    public function badge()
    {
        return match ($this) {
            OrderStatus::Unprocessed => 'bg-yellow-lt',
            OrderStatus::Processing => 'bg-lime-lt',
            OrderStatus::Completed => 'bg-green-lt',
            OrderStatus::Cancelled => 'bg-red-lt',
        };
    }

    public function colorText()
    {
        return match ($this) {
            OrderStatus::Unprocessed => 'text-yellow',
            OrderStatus::Processing => 'text-info',
            OrderStatus::Completed => 'text-success',
            OrderStatus::Cancelled => 'text-danger',
            default => ''
        };
    }

    public function colorBg()
    {
        return match ($this) {
            OrderStatus::Unprocessed => 'bg-yellow',
            OrderStatus::Processing => 'bg-info',
            OrderStatus::Completed => 'bg-success',
            OrderStatus::Cancelled => 'bg-danger',
            default => ''
        };
    }
}
