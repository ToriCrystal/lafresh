<?php

namespace App\Enums\Setting;

use App\Support\Enum;

enum SettingTypeInput: int
{
    use Enum;

    case Text = 1;
    case Number = 2;
    case Email = 3;
    case Phone = 4;
    case Password = 5;
    case Textarea = 6;
    case Image = 7;
    case Gallery = 8;
    case Checkbox = 9;
    case Radio = 10;
}
