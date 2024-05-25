<?php

namespace App\Api\V1\Http\Controllers\ProductCategory;

use App\Admin\Http\Controllers\Controller;
use App\Api\V1\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Api\V1\Repositories\Product\ProductRepositoryInterface;
use \Illuminate\Http\Request;
use App\Api\V1\Http\Resources\ProductCategory\{AllProductCategoryTreeResource, ShowProductCategoryWithAllResource};

/**
 * @group Danh mục sản phẩm
 */

class ProductCategoryController extends Controller
{
    protected $repositoryProduct;
    public function __construct(
        ProductCategoryRepositoryInterface $repository,
        ProductRepositoryInterface $repositoryProduct
    )
    {
        $this->repository = $repository;
        $this->repositoryProduct = $repositoryProduct;
    }

    /**
     * Danh sách danh mục
     *
     * Lấy danh sách danh mục.
     *
     * @headersParam X-TOKEN-ACCESS string required
     * token để lấy dữ liệu. Example: 132323
     * 
     * @queryParam show_home integer
     * Hiển thị ở trang chủ với 1: không; 2: có. Example: 1
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": [
     *          {
     *               "id": 7,
     *               "name": "parent 3",
     *               "slug": "parent-3",
     *               "avatar": null,
     *               "icon": null,
     *               "children": [
     *                   {
     *                       "id": 8,
     *                       "name": "child 3",
     *                       "slug": "child-3",
     *                       "avatar": null
     *                   }
     *               ]
     *           }
     *      ]
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $categories = $this->repository->getTreeByKeys($request->all());
        $categories = new AllProductCategoryTreeResource($categories);

        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess'),
            'data' => $categories
        ]);
    }
    /**
     * Chi tiết danh mục
     *
     * Lấy chi tiết danh mục.
     *
     * @headersParam X-TOKEN-ACCESS string required
     * token để lấy dữ liệu. Example: 132323
     * 
     * @pathParam id integer required
     * id hoặc slug danh mục. Example: 1 | cat-1
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": {
     *          "id": 6,
     *           "name": "children",
     *           "slug": "children",
     *           "parents": [
     *               {
     *                   "id": 7,
     *                   "name": "parent",
     *                   "slug": "parent"
     *               },
     *               {
     *                   "id": 9,
     *                   "name": "chuas",
     *                   "slug": "chuas"
     *               }
     *           ],
     *           "products": [
     *               {
     *                   "id": 5,
     *                   "name": "Iphone 16",
     *                   "slug": "iphone-16",
     *                   "in_stock": true,
     *                   "feature_image": "http://domain.com/public/assets/images/default-image.png",
     *                   "price": 200000,
     *               }
     *           ]
     *       }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        try{
            $category = $this->repository->findByIdOrSlugWithAncestorsAndDescendants($id);
            $category = new ShowProductCategoryWithAllResource($category, $this->repositoryProduct);
            return response()->json([
                'status' => 200,
                'message' => __('notifySuccess'),
                'data' => $category
            ]);
        }catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'status' => 404,
                'message' => __('noData')
            ], 404);
        }
    }
}
