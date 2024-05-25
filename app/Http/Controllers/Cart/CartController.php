<?php

namespace App\Http\Controllers\Cart;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;

class CartController extends Controller
{

    protected $repoProduct;
    public function __construct(ShoppingCartRepositoryInterface $repository, ProductRepositoryInterface $repoProduct)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->repoProduct = $repoProduct;
    }




    public function getView()
    {
        return [
            'home' => 'public.home.index',
            'index' => 'public.carts.index',
            'detail' => 'public.carts.detail-cart',

        ];
    }

    public function getRoute()
    {
        return [
            'login' => 'login.index',
        ];
    }


    public function index()
    {
        $users = auth()->user()->id;
        return view($this->view['index'], ['users' => $users]);
    }


    public function create(Request $request)
    {

        if (!auth()->check()) {
            return redirect()->route($this->route['login'])->with('error', __('Vui lòng đăng nhập trước!'));
        }
        $userId = auth()->user()->id;
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $existingCartItem = $this->findExistingCartItem($userId, $productId);

        if ($existingCartItem) {
            $this->updateCartItem($existingCartItem, $quantity);
            $totalPrice = $this->calculateTotalPrice($userId);
            return back()->with('success', 'Sản phẩm đã được cập nhật trong giỏ hàng. Tổng giỏ hàng: ' . $totalPrice . 'đ');
        }

        $requestData = $this->prepareCartData($request, $userId, $productId, $quantity);
        $this->addNewCartItem($requestData);
        $totalPrice = $this->calculateTotalPrice($userId);
        return back()->with('success', 'Đã thêm vào giỏ hàng thành công. Tổng giỏ hàng: ' . $totalPrice . 'đ');
    }

    protected function findExistingCartItem($userId, $productId)
    {
        return ShoppingCart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
    }

    protected function updateCartItem($cartItem, $quantity)
    {
        $cartItem->quantity += $quantity;
        $cartItem->price_selling = $cartItem->product->price_promotion * $cartItem->quantity;
        $cartItem->save();
    }


    protected function prepareCartData($request, $userId, $productId, $quantity)
    {
        $requestData = $request->all();
        $requestData['user_id'] = $userId;
        $product = $this->repoProduct->find($productId);
        $requestData['price_selling'] = $product->price_promotion * $quantity;
        return $requestData;
    }

    protected function addNewCartItem($requestData)
    {
        $this->repository->create($requestData);
    }

    protected function calculateTotalPrice($userId)
    {
        $cartItems = ShoppingCart::where('user_id', $userId)->get();
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->price_selling;
        }
        return $totalPrice;
    }



    public function delete($id)
    {
        $this->repository->delete($id);
        return back()->with('success', __('notifySuccess'));
    }


    public function detail(Request $request)
    {

        return view($this->view['detail']);
    }
}
