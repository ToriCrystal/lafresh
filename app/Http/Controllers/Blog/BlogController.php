<?php

namespace App\Http\Controllers\Blog;

// use App\Http\Controllers\Controller;
use App\Admin\Http\Controllers\Controller;
use App\Repositories\Blog\PostRepositoryInterface;
use App\Repositories\Blog\CategoryRepositoryInterface;

class BlogController extends Controller
{
    protected $repoPost;
    protected $repoCat;


    public function __construct(
        PostRepositoryInterface $repoPost,
        CategoryRepositoryInterface $repoCat,

    ) {
        parent::__construct();

        $this->repoPost = $repoPost;
        $this->repoCat = $repoCat;
    }

    public function getView()
    {
        return [
            'index' => 'public.posts.index',
            'detail' => 'public.posts.show',
            'cate' => 'public.posts.post-by-cate',

        ];
    }

    public function getRoute()
    {
        return [];
    }

    public function index()
    {
        $posts = $this->repoPost->paginate([], [], []);

        $breadcrums = [['label' => trans('Tin tức')]];

        return view($this->view['index'], [
            'posts' => $posts,
            'breadcrums' => $breadcrums,
        ]);
    }

    public function showPost($slug)
    {

        $posts = $this->repoPost->findByOrFail(['slug' => $slug], ['posts', 'categories']);

        $breadcrums = [
            ['label' => $posts->title]
        ];

        $related = $this->repoPost->getByLimit([
            ['id', '!=', $posts->id]
        ], [
            'categories' => fn ($q) => $q->whereIn('id', $posts->categories->pluck('id')->toArray())
        ], [], 5);

        return view($this->view['detail'], [
            'posts' => $posts,
            'related' => $related,
            'breadcrums' => $breadcrums,
        ]);
    }
}
