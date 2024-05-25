<?php

namespace App\Enums\Product;

use App\Support\Enum;

enum ProductStatus: int
{
    use Enum;

    case Published = 1;
    case Draft = 2;

    public function badge(){
        return match($this) {
            ProductStatus::Published => 'bg-green',
            ProductStatus::Draft => '',
        };
    }
}
