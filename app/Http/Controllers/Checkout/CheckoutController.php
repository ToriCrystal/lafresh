<?php

namespace App\Http\Controllers\Checkout;


use App\Admin\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Admin\Repositories\Order\OrderDetailRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Order\OrderRequest;
use App\Services\Order\OrderServiceInterface;

class CheckoutController extends Controller
{


    protected $repoProduct;
    protected $repoCart;
    protected $repoOrders;
    protected $repoDetail;
    protected $serviceOrder;
    public function __construct(
        ProductRepositoryInterface $repoProduct,
        UserRepositoryInterface $repository,
        OrderRepositoryInterface $repoOrders,
        ShoppingCartRepositoryInterface $repoCart,
        OrderDetailRepositoryInterface $repoDetail,
        OrderServiceInterface $serviceOrder
    ) {
        parent::__construct();
        $this->repository =  $repository;
        $this->repoOrders = $repoOrders;
        $this->repoCart = $repoCart;
        $this->repoProduct = $repoProduct;
        $this->repoDetail = $repoDetail;
        $this->serviceOrder = $serviceOrder;
    }


    public function getView()
    {
        return [
            'index' => 'public.checkout.index',
            'total' => 'public.checkout.fullcart'
        ];
    }

    public function totalPrice()
    {


        return view($this->view['total']);
    }


    public function index(Request $request)
    {
        $id = $request->input('product_id');
        $data = $this->repoProduct->find($id);
        if (!$data) {
            return view('not_found');
        }
        $quantity = $request->input('quantity', 1);
        if (!is_numeric($quantity) || $quantity <= 0) {
            return redirect()->back()->with('error', 'Số lượng không hợp lệ.');
        }
        $data['price_selling'] = $data['price_promotion'] * $quantity;
        return view($this->view['index'], [
            'idds' => $id,
            'qty' => $quantity,
            'data' => $data,
            'quantity' => $quantity,
        ]);
    }





    public function pay($id, $qtyy, OrderRequest $request)
    {
        $order = $this->serviceOrder->createOrder($id, $qtyy, $request);
        return back()->with('success', 'Đã Lên Đơn Thành Công');
    }


    public function payCart(OrderRequest $request)
    {
        $result = $this->serviceOrder->payCart($request, $this->repoCart, $this->repoOrders, $this->repoProduct);
        return back()->with('success', 'Đã Lên Đơn Thành Công');
    }
}
