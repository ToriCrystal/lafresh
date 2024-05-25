<?php

namespace App\Enums\User;

use App\Support\Enum;

enum UserRoles: int
{
    use Enum;

    case Agent = 1;
    case Seller = 2;
}
