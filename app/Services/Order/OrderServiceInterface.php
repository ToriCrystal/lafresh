<?php


namespace  App\Services\Order;


interface OrderServiceInterface{


    public function createOrder($productId, $qty, $request);
}
