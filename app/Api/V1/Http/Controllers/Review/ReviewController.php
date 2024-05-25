<?php

namespace App\Api\V1\Http\Controllers\Review;

use App\Admin\Http\Controllers\Controller;
use App\Api\V1\Http\Requests\Review\ReviewRequest;
use App\Api\V1\Http\Resources\Review\{ReviewResource, ShowReviewResource};
use App\Api\V1\Repositories\Review\ReviewRepositoryInterface;

/**
 * @group Đánh giá sản phẩm
 */

class ReviewController extends Controller
{
    public function __construct(
        ReviewRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * Danh sách review của sản phẩm
     *
     * Lấy danh sách review của sản phẩm.
     *
     * @headersParam X-TOKEN-ACCESS string required
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @queryParam product_id integer required
     * id sản phẩm. Example: 1
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": [
     *          {
     *              "id": 10,
     *               "fullname": "Tran Van A",
     *               "avatar": "http://domain.com/public/assets/images/default-image.png",
     *               "content": "content",
     *               "rating": 5
     *           }
     *      ]
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function index(ReviewRequest $request){
        $reviews = $this->repository->getByProductId($request->get('product_id'));
        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess'),
            'data' => new ReviewResource($reviews)
        ], 200);
    }

    /**
     * Tạo đánh giá
     *
     * Tạo đánh giá cho sản phẩm.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @bodyParam product_id integer required
     * id sản phẩm. Example: 1
     * 
     * @bodyParam rating integer required
     * Xếp hạng đánh giá. Example: 5
     * 
     * @bodyParam content string
     * Nội dung đánh giá. Example: content
     * 
     * @authenticated
     * 
     * @response {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *       "data": {
     *            "id": 10,
     *            "fullname": "Tran Van A",
     *            "avatar": "http://domain.com/public/assets/images/default-image.png",
     *            "content": "content",
     *            "rating": 5
     *      }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function store(ReviewRequest $request){
        $data = $request->validated();
        $response = $this->repository->createAuthCurrent($data)->load(['user']);
        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess'),
            'data' => new ShowReviewResource($response)
        ], 200);
    }
}