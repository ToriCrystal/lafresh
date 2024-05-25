<?php

namespace App\Http\Controllers\Blog;

use App\Admin\Http\Controllers\Controller;
use App\Repositories\Blog\CategoryRepositoryInterface;
use App\Repositories\Blog\PostRepositoryInterface;

class PostCategoryController extends Controller
{

    protected $repoPost;

    public function __construct(
        PostRepositoryInterface $repoPost,
        CategoryRepositoryInterface $repository,
    ) {
        parent::__construct();

        $this->repoPost = $repoPost;
        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'show' => 'public.posts.index',
        ];
    }

    public function getRoute()
    {
        return [];
    }

    public function show($slug)
    {

        $category = $this->repository->findByOrFail(['slug' => $slug]);

        $posts = $this->repoPost->paginate([], [
            'categories' => fn ($q) => $q->where('id', $category->id)
        ]);

        $breadcrums = [
            ['label' => $category->name]
        ];

        return view($this->view['show'], compact('posts', 'breadcrums'));
    }
}
