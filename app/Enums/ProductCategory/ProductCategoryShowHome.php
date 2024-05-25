<?php

namespace App\Enums\ProductCategory;

use App\Support\Enum;

enum ProductCategoryShowHome: int
{
    use Enum;

    case No = 1;
    case Yes = 2;

    public function badge(){
        return match($this) {
            ProductCategoryShowHome::Yes => 'bg-green',
            ProductCategoryShowHome::No => '',
        };
    }
}
