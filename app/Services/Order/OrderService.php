<?php

namespace App\Services\Order;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderPaymentMethod;
use App\Services\Order\OrderServiceInterface;
use App\Repositories\Product\ProductRepository;

class OrderService implements OrderServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createOrder($productId, $qty, $request)
    {   
        $data = $request->all();
        if ($request->input('shipping_method') == 'cod') {
            $data['shipping_method'] = OrderPaymentMethod::COD;
        } else {
            $data['shipping_method'] = OrderPaymentMethod::BankTransfer;
        }

        $product = $this->productRepository->find($productId);
        $subTotal = $product->price_promotion * $qty;

        $data['sub_total'] = $product->price;
        $data['discount'] = 1;
        $data['total'] = $subTotal;
        $data['status'] = OrderStatus::Unprocessed;
        $data['user_id'] = auth()->user()->id;
        $data['customer_role'] = auth()->user()->roles;

        $order = Order::create($data);

        $orderDetail = [
            'order_id' => $order->id,
            'product_id' => $productId,
            'qty' => $qty,
            'unit_price' => $product->price_promotion,
            'unit' => $product->unit,
            'detail' => $request->input('note'),
        ];

        OrderDetail::create($orderDetail);

        return $order;
    }


    public function payCart($request, $repoCart, $repoOrders, $repoProduct)
    {
        $data = $request->all();
        if ($request->input('shipping_method') == 'cod') {
            $data['shipping_method'] = OrderPaymentMethod::COD;
        } else {
            $data['shipping_method'] = OrderPaymentMethod::BankTransfer;
        }
        $cartProducts = $repoCart->getAll();
        $price = $cartProducts->pluck('price_selling')->sum();
        $qty = $cartProducts->pluck('quantity')->sum();

        $data['note'] = $request->input('note');
        $data['total'] = $price;
        $data['sub_total'] = $price;
        $data['customer_role'] = auth()->user()->roles;
        $data['user_id'] = auth()->user()->id;
        $data['status'] = OrderStatus::Unprocessed;
        $data['discount'] = 1;
        $Orders = $repoOrders->create($data);
        $idProduct = $cartProducts->pluck('product_id');
        foreach ($idProduct as $productId) {
            $product = $repoProduct->find($productId);
            if ($product) {
                OrderDetail::create([
                    'order_id' => $Orders->id,
                    'product_id' => $productId,
                    'qty' => $qty,
                    'unit_price' => $product->price_promotion,
                    'unit' => $product->unit,
                    'detail' => $Orders->note,
                ]);
            }
        }
        return $Orders;
    }



}
