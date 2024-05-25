<?php

namespace App\Api\V1\Services\Order;

use App\Api\V1\Services\Order\OrderServiceInterface;
use App\Api\V1\Repositories\Order\{OrderRepositoryInterface, OrderDetailRepositoryInterface};
use App\Api\V1\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use App\Api\V1\Repositories\User\UserRepositoryInterface;
use App\Enums\Order\{OrderPaymentMethod, OrderShippingMethod, OrderStatus};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;
    protected $repositoryOrderDetail;
    protected $repositoryShoppingCart;
    protected $subTotal = 0;
    protected $orderDetail = [];
    protected $repositoryUser;

    public function __construct(
        OrderRepositoryInterface $repository,
        OrderDetailRepositoryInterface $repositoryOrderDetail,
        ShoppingCartRepositoryInterface $repositoryShoppingCart,
        UserRepositoryInterface $repositoryUser
    ){
        $this->repository = $repository;
        $this->repositoryOrderDetail = $repositoryOrderDetail;
        $this->repositoryUser = $repositoryUser;
        $this->repositoryShoppingCart = $repositoryShoppingCart;
    }
    
    public function store(Request $request){
        $this->data = $request->validated();
        $this->data['user_id'] = auth()->user()->id;
        $this->data['discount'] = 0;
        $this->data['shipping_method'] = OrderShippingMethod::Road;
        $this->data['status'] = OrderStatus::Processing;
        DB::beginTransaction();
        try {
            $makeData = $this->getDataFromShoppingCart();
            if(!$makeData){
                return false;
            }

            $this->data['sub_total'] = $this->subTotal;
            
            $userLevel = $this->repositoryUser->findLevel($this->data['user_id']);

            if($userLevel){
                $this->data['discount'] = $userLevel->typeDiscountAmount() ? (- $userLevel->plain_value) : (- $this->data['sub_total'] * $userLevel->plain_value / 100);
            }
            $this->data['total'] = $this->data['sub_total'] + $this->data['discount'];
            
            $order = $this->repository->create($this->data);

            $this->storeOrderDetail($order->id, $this->orderDetail);

            $this->repositoryShoppingCart->deleteAllCurrentAuth();

            DB::commit();
            return $order;
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function update(Request $request){
        
        $this->data = $request->validated();


    }
    public function cancel(Request $request){

        return $this->repository->cancel($request->input('id'));

    }

    public function delete($id){
        return $this->repository->delete($id);
    }

    protected function storeOrderDetail($orderId, $data){
        foreach($data as $item){
            $item['order_id'] = $orderId;
            $this->repositoryOrderDetail->create($item);
        }
    }

    protected function getDataFromShoppingCart(){
        $shoppingCarts = $this->repositoryShoppingCart->getAuthCurrent();
        if($shoppingCarts->count() == 0){
            return false;
        }

        $shoppingCarts->map(function($shoppingCart){

            $unitPrice = $shoppingCart->product->price_promotion ?: $shoppingCart->product->price;
            $unitPricePurchaseQty = null;
            $purchaseQty = $shoppingCart->product->findOnePurchaseFollowQty($shoppingCart->qty);
            if($purchaseQty){
                $unitPrice = $shoppingCart->product->price;
                if($purchaseQty->typeAmount()){
                    $unitPricePurchaseQty = $shoppingCart->product->price * $shoppingCart->qty - $purchaseQty->plain_value;
                }else{
                    $unitPricePurchaseQty = $shoppingCart->product->price * $shoppingCart->qty * (100 - $purchaseQty->plain_value) / 100;
                }
            }
            $this->orderDetail[] = [
                'product_id' => $shoppingCart->product_id,
                'unit_price' => $unitPrice,
                'unit_price_purchase_qty' => $unitPricePurchaseQty,
                'qty' => $shoppingCart->qty,
                'detail' => [
                    'product' => $shoppingCart->product
                ]
            ];
            $this->subTotal += $unitPricePurchaseQty ? $unitPricePurchaseQty : $unitPrice * $shoppingCart->qty;
        });
        return true;
    }
}