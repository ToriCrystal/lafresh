<?php

namespace App\Enums\Product;

use App\Support\Enum;

enum ProductPurchaseQtyType: int
{
    use Enum;

    case Amount = 1;
    case Percent = 2;
}
