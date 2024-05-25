<?php

namespace App\Enums\Category;

use App\Support\Enum;

enum CategoryStatus: int
{
    use Enum;

    case Published = 1;
    case Draft = 2;

    public function badge(){
        return match($this) {
            CategoryStatus::Published => 'bg-green',
            CategoryStatus::Draft => '',
        };
    }
}
