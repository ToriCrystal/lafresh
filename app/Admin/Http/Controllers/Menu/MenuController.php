<?php

namespace App\Admin\Http\Controllers\Menu;

use App\Admin\DataTables\Menu\MenuDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Menu\MenuRequest;
use App\Admin\Http\Resources\Menu\MenuItemToTreeResource;
use App\Admin\Repositories\Menu\MenuRepositoryInterface;
use App\Admin\Repositories\Page\PageRepositoryInterface;
use App\Admin\Repositories\PostCategory\PostCategoryRepositoryInterface;
use App\Admin\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Admin\Services\Menu\MenuServiceInterface;
use App\Enums\DefaultStatus;

class MenuController extends Controller
{
    protected $repoCatProduct;
    protected $repoCatPost;
    protected $repoPage;
    public function __construct(
        MenuRepositoryInterface $repository,
        ProductCategoryRepositoryInterface $repoCatP,
        PostCategoryRepositoryInterface $repoCatPost,
        PageRepositoryInterface $repoPage,
        MenuServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->repoCatProduct = $repoCatP;
        $this->repoCatPost = $repoCatPost;
        $this->repoPage = $repoPage;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.menus.index',
            'create' => 'admin.menus.create',
            'edit' => 'admin.menus.edit',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.menu.index',
            'edit' => 'admin.menu.edit',
        ];
    }

    public function index(MenuDataTable $dataTable)
    {
        return $dataTable->render($this->view['index']);
    }

    public function create()
    {
        return view($this->view['create'], [
            'status' => DefaultStatus::asSelectArray()
        ]);
    }

    public function store(MenuRequest $request)
    {

        $response = $this->service->store($request);

        if ($response) {

            return to_route($this->route['edit'], $response->id);
        }

        return back()->with('error', __('notifyFail'));
    }

    public function edit($id)
    {

        $menu = $this->repository->findOrFail($id, ['locations', 'items.reference']);

        $menuItems = new MenuItemToTreeResource($menu->items->toTree());

        $catProduct = $this->repoCatProduct->getFlatTree();
        $catPost = $this->repoCatPost->getFlatTree();
        $pages = $this->repoPage->getAll();

        $menuLocaltions = config('custom.menu.locations');

        return view($this->view['edit'], [
            'menu' => $menu,
            'menu_items' => $menuItems,
            'status' => DefaultStatus::asSelectArray(),
            'cat_p' => $catProduct,
            'cat_post' => $catPost,
            'pages' => $pages,
            'menu_locations' => $menuLocaltions
        ]);
    }

    public function update(MenuRequest $request)
    {

        $response = $this->service->update($request);

        if ($response) {
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }

    public function delete($id)
    {

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
