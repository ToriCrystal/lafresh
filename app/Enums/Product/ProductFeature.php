<?php

namespace App\Enums\Product;

use App\Support\Enum;

enum ProductFeature: int
{
    use Enum;

    case No = 1;
    case Yes = 2;

    public function badge(){
        return match($this) {
            ProductFeature::Yes => 'bg-green',
            ProductFeature::No => '',
        };
    }
}
