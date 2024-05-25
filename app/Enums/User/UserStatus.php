<?php

namespace App\Enums\User;

use App\Support\Enum;

enum UserStatus: int
{
    use Enum;

    case Active = 1;
    case Locked = 2;
}
