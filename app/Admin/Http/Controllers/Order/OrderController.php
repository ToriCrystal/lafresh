<?php

namespace App\Admin\Http\Controllers\Order;

use App\Admin\DataTables\Order\OrderDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Order\OrderRequest;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Admin\Repositories\Product\ProductRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\Services\Order\OrderServiceInterface;
use App\Enums\Order\OrderPaymentMethod;
use App\Enums\Order\OrderShippingMethod;
use App\Enums\Order\OrderStatus;

class OrderController extends Controller
{
    protected $repositoryUser;
    protected $repositoryProduct;

    public function __construct(
        OrderRepositoryInterface $repository,
        UserRepositoryInterface $repositoryUser,
        ProductRepositoryInterface $repositoryProduct,
        OrderServiceInterface $service
    ) {
        parent::__construct();
        $this->repository = $repository;
        $this->repositoryUser = $repositoryUser;
        $this->repositoryProduct = $repositoryProduct;
        $this->service = $service;
    }
    public function getView()
    {
        return [
            'index' => 'admin.orders.index',
            'create' => 'admin.orders.create',
            'edit' => 'admin.orders.edit',
            'product_seller' => 'admin.orders.partials.products-seller',
            'info_shipping' => 'admin.orders.partials.info-shipping',
            'add_item_product' => 'admin.orders.partials.add-item-product',
            'total' => 'admin.orders.partials.total',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.order.index',
            'create' => 'admin.order.create',
            'edit' => 'admin.order.edit',
            'delete' => 'admin.order.delete',
        ];
    }
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render($this->view['index'], [
            'status' => OrderStatus::asSelectArray(),
        ]);
    }
    public function create()
    {
        return view($this->view['create'], [
            'payment_method' => OrderPaymentMethod::asSelectArray(),
            'shipping_method' => OrderShippingMethod::asSelectArray(),
        ]);
    }
    public function store(OrderRequest $request)
    {
        $order = $this->service->store($request);
        if ($order) {
            return to_route($this->route['edit'], $order->id);
        }
        return back()->with('error', __('notifyFail'));
    }
    public function edit($id)
    {
        $order = $this->repository->findOrFailWithRelations($id);
        $status = OrderStatus::asSelectArray();
        return view($this->view['edit'], compact('order', 'status'));
    }
    public function update(OrderRequest $request)
    {
        $response = $this->service->update($request);
        if ($response) {
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }

    public function renderInfoShipping(OrderRequest $request)
    {
        $user = $this->repositoryUser->findOrFail($request->input('user_id'));
        return view($this->view['info_shipping'], [
            'customer_fullname' => $user->fullname,
            'customer_email' => $user->email,
            'customer_phone' => $user->phone,
            'customer_role' => $user->roles,
            'shipping_address' => $user->address,
        ]);
    }

    public function checkUserRole(OrderRequest $request)
    {
        $user = $this->repositoryUser->findOrFail($request->input('user_id'));
        return view($this->view['product_seller'], [
            'user' => $user,
        ]);
    }

    public function addProduct(OrderRequest $request)
    {
        $user = $this->repositoryUser->findOrFail($request->input('user_id'));
        $product = $this->service->addProduct($request);

        if (!$product) {
            return response()->json([
                'status' => 400,
                'message' => __('notifyFail'),
            ], 400);
        }
        $response = view($this->view['add_item_product'], compact('product', 'user'))->render();

        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess'),
            'data' => $response,
        ], 200);
    }

    public function calculateTotalBeforeSaveOrder(OrderRequest $request)
    {
        if (!$request->input('order_detail.product_id')) {
            return response()->json([
                'status' => 200,
                'message' => __('notifySuccess'),
                'data' => view($this->view['total'])->render(),
            ], 200);
        } else {
            $response = $this->service->calculateTotal($request);
            return response()->json([
                'status' => 200,
                'message' => __('notifySuccess'),
                'data' => view($this->view['total'], $response)->render(),
            ], 200);
        }
    }

    public function updatePriceProduct(OrderRequest $request)
    {
        return $this->service->updatePriceProduct($request);
    }
}
