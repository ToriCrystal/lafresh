<?php

namespace App\Enums\Product;

use App\Support\Enum;

enum ProductUnit: int
{
    use Enum;

    case Pail = 1;
    case Bottle = 2;
}
