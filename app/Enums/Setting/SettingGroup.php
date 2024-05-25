<?php

namespace App\Enums\Setting;

use App\Support\Enum;

enum SettingGroup: int
{
    use Enum;

    case General = 1;
    case Job = 2;
}
