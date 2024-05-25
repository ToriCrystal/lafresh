<?php

namespace App\Api\V1\Http\Controllers\Page;

use App\Admin\Http\Controllers\Controller;
use App\Api\V1\Http\Resources\Page\{ShowPageResource};
use App\Api\V1\Repositories\Page\PageRepositoryInterface;

/**
 * @group Trang
 */

class PageController extends Controller
{
    public function __construct(
        PageRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }
    /**
     * Chi tiết trang
     *
     * Lấy chi tiết trang.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam id string required
     * id_or_slug trang. Example: 1
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": {
     *           "id": 4,
     *           "title": "Hé lộ ios 17 sắp ra mắt",
     *           "slug": "he-lo-ios-17-sap-ra-mat",
     *           "content": "<p>H&eacute; lộ ios 17 sắp ra mắt</p>",
     *       }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id_or_slug){
        
        $page = $this->repository->findByIdOrSlug($id_or_slug);
        $page = new ShowPageResource($page);

        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess'),
            'data' => $page
        ]);
    }
}