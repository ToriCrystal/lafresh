<?php

namespace App\Enums\Order;

use App\Support\Enum;

enum OrderShippingMethod: int
{
    use Enum;

    case Road = 1;
    case Air = 2;
}
