<?php

namespace App\View\Composers\Post;
use Illuminate\View\View;

class PostComposer
{
    protected $repoPost;

    public function __construct()
    {
        $this->repoPost = app()->make('App\Repositories\Blog\PostRepositoryInterface');
    }

    public function compose(View $view)
    {
        $posts = $this->repoPost->paginate([],[],[], 4);
        $view->with('posts', $posts);
    }

}
