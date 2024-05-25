<?php

namespace App\Admin\Http\Controllers\Statistic;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Order\OrderDetailRepositoryInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticController extends Controller
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
            'revenue' => 'admin.statistics.revenue',
            'order' => 'admin.statistics.order',
            'product_sold' => 'admin.statistics.product_sold',
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

    public function revenue(Request $request){

        $dateBetween = [Carbon::parse($request->input('start_date', now()->subDays(30))), Carbon::parse($request->input('end_date', now()))];

        $chartOrder = $this->repoOrder->chartRevenue($dateBetween);
        
        return view($this->view['revenue'], [
            'chart_order' => $chartOrder,
        ]);
    }

    public function order(Request $request){
        $dateBetween = [Carbon::parse($request->input('start_date', now()->subDays(30))), Carbon::parse($request->input('end_date', now()))];

        $chartOrderCount = $this->repoOrder->chartCountEveryDay($dateBetween);
        
        return view($this->view['order'], [
            'chart_order_count' => $chartOrderCount,
        ]);
    }

    public function productSold(Request $request){
        $dateBetween = [Carbon::parse($request->input('start_date', now()->subDays(30))), Carbon::parse($request->input('end_date', now()))];

        $chartProductSold = $this->repoOrderDetail->chartProductSold($dateBetween);
        
        return view($this->view['product_sold'], [
            'chart_product_sold' => $chartProductSold,
        ]);
    }

}
