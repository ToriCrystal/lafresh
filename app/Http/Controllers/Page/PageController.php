<?php

namespace App\Http\Controllers\Page;

use App\Admin\Http\Controllers\BaseController;
use App\Repositories\Page\PageRepositoryInterface;

class PageController extends BaseController
{
    protected $repositoryPage;
    public function __construct(
        PageRepositoryInterface $repositoryPage,
    ) {

        parent::__construct();
        $this->repositoryPage = $repositoryPage;
    }
    public function getView()
    {
        return [
            'index' => 'public.pages.index',
        ];
    }
    public function getRoute()
    {
        return [
            'index' => 'public.page.index',
        ];
    }
    public function pages($slug)
    {
        $page = $this->repositoryPage->findByOrFail(['slug' => $slug]);
        return view($this->view['index'], [
            'page' => $page,
        ]);
    }
}