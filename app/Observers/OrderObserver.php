<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //
        if($order->total < 0){
            $order->total = 0;
        }
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if($order->user_id && $order->isCompleted()){
            $repoUser = app()->make('App\Admin\Repositories\User\UserRepositoryInterface');
            $repoUserLevel = app()->make('App\Admin\Repositories\User\UserLevelRepositoryInterface');
            $totalAmountOrder = $repoUser->getAllTotalAmountOrder($order->user_id);
            $level = $repoUserLevel->getCompatibleLevel($totalAmountOrder);
            if($level){
                $repoUser->update($order->user_id, [
                    'level_id' => $level->id
                ]);
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
