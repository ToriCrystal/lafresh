<?php

namespace App\Api\V1\Http\Controllers\ShoppingCart;

use App\Admin\Http\Controllers\Controller;
use App\Api\V1\Services\ShoppingCart\ShoppingCartServiceInterface;
use App\Api\V1\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use App\Api\V1\Http\Requests\ShoppingCart\ShoppingCartRequest;
use App\Api\V1\Http\Resources\ShoppingCart\ShoppingCartResource;

/**
 * @group Giỏ hàng
 */

class ShoppingCartController extends Controller
{

    public function __construct(
        ShoppingCartRepositoryInterface $repository,
        ShoppingCartServiceInterface $service
    )
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Danh sách sản phẩm trong giỏ hàng
     *
     * Lấy danh sách sản phẩm trong giỏ hàng của user.
     *
     * <ul>
     * <li><strong>Trong purchase_qty có type</strong>: 
     *      <ul>
     *          <li>1: Giảm theo số tiền</li>
     *          <li>2: Giảm theo phần trăm</li>
     *      </ul>
     * </li>
     * </ul>
     * 
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * 
     * @authenticated
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": [
     *          {
     *       "id": 7,
     *       "qty": 2,
     *       "product": {
     *           "id": 5,
     *           "name": "Iphone 16",
     *           "slug": "iphone-16-1",
     *           "in_stock": true,
     *           "feature_image": "/public/assets/images/default-image.png"
     *       }
     *   }
     *      ]
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $shoppingCart = $this->repository->getAuthCurrent();
        $shoppingCart = new ShoppingCartResource($shoppingCart);
        // $total_cart = 0;
        // foreach($shoppingCart as $item){
        //     $total_cart += $item->qty * ($item->product->price_promotion ?: $item->product->price);
        // }
        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess'),
            'data' => $shoppingCart,
            // 'total_cart' => $total_cart
        ]);
    }
    /**
     * Thêm sản phẩm vào giỏ hàng
     *
     * Thêm sản phẩm vào giỏ hàng của user.
     * 
     * Lưu ý: Trong mảng product_id sẽ tương ứng với mảng qty.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @bodyParam product_id[] integer required
     * id sản phẩm. Example: 1
     * 
     * @bodyParam qty[] integer required
     * Số lượng sản phẩm. Example: 1
     * 
     * @authenticated
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(ShoppingCartRequest $request){
        $response = $this->service->store($request);
        if($response){
            return response()->json([
                'status' => 200,
                'message' => __('notifySuccess')
            ]);
        }
        return response()->json([
            'status' => 400,
            'message' => __('productNoVariable')
        ], 400);
    }

    /**
     * Cập nhật giỏ hàng
     *
     * Cập nhật hoặc xóa item giỏ hàng của user.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @bodyParam id[] integer required
     * Danh sách id item giỏ hàng. Example: 1
     * 
     * @bodyParam qty[] integer required
     * Danh sách qty phải tương ứng với ds id (nếu qty = 0 item sẽ bị xóa). Example: 1
     * 
     * @authenticated
     * 
     * @response {
     *      "status": 200,
     *      "message": "Thực hiện thành công."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(ShoppingCartRequest $request){
        $response = $this->service->update($request);
        if($response){
            return response()->json([
                'status' => 200,
                'message' => __('notifySuccess')
            ]);
        }
        return response()->json([
            'status' => 400,
            'message' => __('notifyFail')
        ], 400);
    }
     /**
     * Xóa item giỏ hàng
     *
     *  Truyền vào mảng id item giỏ hàng để xóa.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @bodyParam id[] integer required
     * Danh sách id item giỏ hàng. Example: 1
     * 
     * 
     * @authenticated
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function delete(ShoppingCartRequest $request){
        $response = $this->service->deleteMultiple($request);
        if($response){
            return response()->json([
                'status' => 200,
                'message' => __('Thực hiện thành công.')
            ]);
        }
        return response()->json([
            'status' => 400,
            'message' => __('Thực hiện không thành công.')
        ], 400);
    }
}
