<?php

namespace App\Enums\Order;

use App\Support\Enum;

enum OrderPaymentMethod: int
{
    use Enum;

    case COD = 1;
    case BankTransfer = 2;
}
