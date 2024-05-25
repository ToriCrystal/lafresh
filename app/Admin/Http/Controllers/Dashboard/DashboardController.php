<?php

namespace App\Admin\Http\Controllers\Dashboard;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Order\OrderDetailRepositoryInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $repoUser;
    public $repoOrder;
    public $repoOrderDetail;

    public function __construct(
        OrderRepositoryInterface $repoOrder,
        UserRepositoryInterface $repoUser,
        OrderDetailRepositoryInterface $repoOrderDetail
    )
    {
        parent::__construct();
        $this->repoOrder = $repoOrder;
        $this->repoUser = $repoUser;
        $this->repoOrderDetail = $repoOrderDetail;
    }

    public function getView()
    {
        return [
            'index' => 'admin.dashboard.index'
        ];
    }
    public function index(){
        $chartOrder = $this->repoOrder->chartRevenue([now()->subDays(7), now()]);
        $statisticOrder = $this->repoOrder->totalRevenue();
        $totaluser = $this->repoUser->count();
        
        $totalProductSold = $this->repoOrderDetail->totalProductSold();
        $chartProductSold = $this->repoOrderDetail->chartProductSold([now()->subDays(7), now()]);
        return view($this->view['index'], [
            'statistic_order' => $statisticOrder,
            'total_user' => $totaluser,
            'total_product_sold' => $totalProductSold,
            'chart_order' => $chartOrder,
            'chart_product_sold' => $chartProductSold
        ]);
        // return to_route('admin.order.index');
    }

}
