<?php

namespace App\Enums\Slider;

use App\Support\Enum;

enum SliderStatus: int
{
    use Enum;

    case Published = 1;
    case Draft = 2;

    public function badge(){
        return match($this) {
            SliderStatus::Published => 'bg-green',
            SliderStatus::Draft => '',
        };
    }
}
