<?php

namespace App\Enums\Post;

use App\Support\Enum;

enum PostCategoryStatus: int
{
    use Enum;

    case Published = 1;
    case Draft = 2;

    public function badge(){
        return match($this) {
            PostCategoryStatus::Published => 'bg-green',
            PostCategoryStatus::Draft => '',
        };
    }
}
