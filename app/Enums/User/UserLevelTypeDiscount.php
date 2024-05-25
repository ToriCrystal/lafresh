<?php

namespace App\Enums\User;

use App\Support\Enum;

enum UserLevelTypeDiscount: int
{
    use Enum;

    case Amount = 1;
    case Percent = 2;
}
