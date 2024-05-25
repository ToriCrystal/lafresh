<?php

namespace App\Admin\Http\Controllers\BonusSale;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\BonusSale\BonusSaleRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\DataTables\BonusSale\BonusSaleDataTable;
use App\Admin\Services\BonusSale\BonusSaleServiceInterface;
use Illuminate\Http\Request;
use App\Enums\Product\ProductUnit;

class BonusSaleController extends Controller
{

    protected $repository;

    protected $service;

    protected $userRepo;

    public function __construct(
        BonusSaleRepositoryInterface $repository,
        UserRepositoryInterface $userRepo,
        BonusSaleServiceInterface $service
    ) {
        parent::__construct();
        $this->repository = $repository;
        $this->userRepo = $userRepo;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.bonus_sale.index',
            'point' => 'admin.bonus_sale.point'
        ];
    }

    public function getRoute()
    {
        return [
            'delete' => 'admin.bonus.sales.delete'
        ];
    }

    public function index(BonusSaleDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
        ]);
    }

    public function delete($id){

        $this->service->delete($id);
        
        return back()->with('success', __('notifySuccess'));
        
    }

}
