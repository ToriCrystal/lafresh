<?php

namespace App\Enums\ProductCategory;

use App\Support\Enum;

enum ProductCategoryStatus: int
{
    use Enum;

    case Published = 1;
    case Draft = 2;

    public function badge(){
        return match($this) {
            ProductCategoryStatus::Published => 'bg-green',
            ProductCategoryStatus::Draft => '',
        };
    }
}
