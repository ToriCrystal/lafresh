<?php

namespace App\Admin\Repositories\Order;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Order\OrderDetailRepositoryInterface;
use App\Enums\Order\OrderStatus;
use App\Models\OrderDetail;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class OrderDetailRepository extends EloquentRepository implements OrderDetailRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return OrderDetail::class;
    }

    public function totalProductSold(){
        $this->instance = $this->model->whereHas('order', function($query) {
            $query->where('status', OrderStatus::Completed);
        })->sum('qty');
        return $this->instance;
    }

    public function chartProductSold(array $dateBetween){
        $period = CarbonPeriod::create(...$dateBetween);
        $array = [];
        
        $this->instance = $this->model->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as sell_date'), DB::raw('SUM(qty) as product_qty'))
        ->whereBetween('created_at', [$dateBetween[0]->subDay(), $dateBetween[1]->addDay()])
        ->groupBy(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'))
        ->orderBy(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'))
        ->pluck('product_qty', 'sell_date')->toArray();
        
        foreach($period as $item){
            $array[] = [
                'sell_date' => $item->format('d-m-Y'),
                'product_qty' => $this->instance[$item->format('d-m-Y')] ?? 0
            ];
        }
        return collect($array);
    }
}