<?php

namespace App\Enums\Product;

use App\Support\Enum;

enum ProductNew: int
{
    use Enum;

    case No = 1;
    case Yes = 2;

    public function badge(){
        return match($this) {
            ProductNew::Yes => 'bg-green',
            ProductNew::No => '',
        };
    }
}
