<?php

namespace App\Repositories\Post;

use App\Admin\Repositories\Post\PostRepository as AdminPostRepository;
use App\Repositories\Post\PostRepositoryInterface;

class PostRepository extends AdminPostRepository implements PostRepositoryInterface
{
}