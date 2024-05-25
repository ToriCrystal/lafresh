<?php

namespace App\Api\V1\Http\Controllers\Product;

use App\Admin\Http\Controllers\Controller;
use App\Api\V1\Http\Requests\Product\ProductWishlistRequest;
use App\Api\V1\Http\Resources\Product\AllProductResource;
use App\Api\V1\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

/**
 * @group Sản phẩm yêu thích
 */

class ProductWishlistController extends Controller
{
    public function __construct(
        ProductRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }
    /**
     * Danh sách sản phẩm
     *
     * Lấy danh sách sản phẩm.
     *
     * @headersParam X-TOKEN-ACCESS string required
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @authenticated
     * 
     * @response {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": [
     *          {
     *               "id": 10,
     *               "name": "Iphone 14",
     *               "slug": "iphone-14",
     *               "in_stock": true,
     *               "feature": 1,
     *               "new": 1,
     *               "feature_image": "http://domain.com/public/assets/images/default-image.png",
     *               "price": 20900,
     *               "price_promotion": 10000,
     *               "short_desc: ""
     *           }
     *      ]
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $products = auth('sanctum')->user()->productWishlists()->get();

        $products = new AllProductResource($products);

        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess'),
            'data' => $products
        ]);
    }

    /**
     * Yêu thích sản phẩm
     *
     * Thêm sản phẩm vào danh sách yêu thích.
     *
     * @headersParam X-TOKEN-ACCESS string required
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
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

    public function store(ProductWishlistRequest $request){
        auth('sanctum')->user()->productWishlists()->sync($request->input('product_id'));
        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess')
        ], 200);
    }
     /**
     * Xóa sp Yêu thích
     *
     * Xóa sản phẩm khỏi danh sách yêu thích.
     *
     * @headersParam X-TOKEN-ACCESS string required
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @bodyParam product_id integer required
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
    public function remove(ProductWishlistRequest $request){
        auth('sanctum')->user()->productWishlists()->detach($request->input('product_id'));
        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess')
        ], 200);
    }
}