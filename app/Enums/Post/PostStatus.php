<?php

namespace App\Enums\Post;

use App\Support\Enum;

enum PostStatus: int
{
    use Enum;

    case Published = 1;
    case Draft = 2;

    public function badge(){
        return match($this) {
            PostStatus::Published => 'bg-green',
            PostStatus::Draft => '',
        };
    }
}
