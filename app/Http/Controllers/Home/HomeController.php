<?php

namespace App\Http\Controllers\Home;

use App\Admin\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Blog\PostRepositoryInterface;

class HomeController extends Controller
{
    protected $repoPost;
    public function __construct(PostRepositoryInterface $repoPost)
    {
        parent::__construct();
        $this->repoPost = $repoPost;
    }

    public function getView()
    {
        return [
            'index' => 'public.home.index',
        ];
    }

    public function getRoute()
    {
        return [];
    }

    public function index()
    {
        return view($this->view['index']);
    }
}
