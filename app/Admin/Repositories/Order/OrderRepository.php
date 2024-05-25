<?php

namespace App\Admin\Repositories\Order;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Enums\Order\OrderStatus;
use App\Models\Order;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Order::class;
    }
    public function findOrFailWithRelations($id, array $relations = ['details', 'user']){
        $this->findOrFail($id);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }
    public function getQueryBuilderWithRelations($relations = ['user']){
        $this->getQueryBuilder();
        $this->instance = $this->instance->with($relations)->orderBy('id', 'desc');
        return $this->instance;
    }

    public function totalRevenue(){
        $this->instance = $this->model->select(DB::raw('SUM(total) as order_total, COUNT(*) as order_count'))
        ->where('status', OrderStatus::Completed)
        ->get();
        return $this->instance;
    }

    public function chartCountEveryDay(array $dateBetween){
        $period = CarbonPeriod::create(...$dateBetween);
        $array = [];

        $this->instance = $this->model->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as order_date'), DB::raw('count(*) as order_count'))
        ->whereBetween('created_at', [$dateBetween[0]->subDay(), $dateBetween[1]->addDay()])
        ->groupBy(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'))
        ->pluck('order_count', 'order_date')
        ->toArray();
        
        foreach($period as $item){
            $array[] = [
                'order_date' => $item->format('d-m-Y'),
                'order_count' => $this->instance[$item->format('d-m-Y')] ?? 0
            ];
        }
        return collect($array);
    }

    public function chartRevenue(array $dateBetween){
        $period = CarbonPeriod::create(...$dateBetween);
        $array = [];
        
        $this->instance = $this->model->select(DB::raw('DATE_FORMAT(updated_at, "%d-%m-%Y") as order_date'), DB::raw('SUM(total) as order_total'))
        ->where('status', OrderStatus::Completed)
        ->whereBetween('updated_at', [$dateBetween[0]->subDay(), $dateBetween[1]->addDay()])
        ->groupBy(DB::raw('DATE_FORMAT(updated_at, "%d-%m-%Y")'))
        ->orderBy(DB::raw('DATE_FORMAT(updated_at, "%d-%m-%Y")'))
        ->pluck('order_total', 'order_date')->toArray();
        
        foreach($period as $item){
            $array[] = [
                'order_date' => $item->format('d-m-Y'),
                'order_total' => $this->instance[$item->format('d-m-Y')] ?? 0
            ];
        }
        return collect($array);
    }
}