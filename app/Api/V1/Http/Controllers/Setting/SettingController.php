<?php
namespace App\Api\V1\Http\Controllers\Setting;

use App\Admin\Http\Controllers\Controller;
use App\Api\V1\Http\Resources\Setting\AllSettingResource;
use App\Api\V1\Http\Resources\Setting\ShowSettingResource;
use App\Api\V1\Repositories\Setting\SettingRepositoryInterface;

/**
 * @group Cài đặt
 */

class SettingController extends Controller
{
    public function __construct(
        SettingRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }
/**
     * Tất cả thông tin cài đặt
     *
     * Lấy tất cả thông tin cài đặt trong admin.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": {
     *           "name": "Home page",
     *           "desc": "321",
     *           "items": [
     *           {
     *               "site_name": "Site name"
     *           },
     *           {
     *               "site_logo": "http://localhost:8888/banhang/public/assets/images/logo.png"
     *           },
     *           {
     *               "site_favicon": "http://localhost:8888/banhang/public/assets/images/logo.png"
     *           },
     *           {
     *               "email": "mevivu@gmail.com"
     *           },
     *           {
     *               "hotline": "0999999999"
     *           },
     *           {
     *               "address": "998/42/15 Quang Trung, GV"
     *           }
     *       ]
     *       }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $settings = $this->repository->getAll()->getInstance();
        return response()->json([
            'status' => 200,
            'msg' => __('notifySuccess'),
            'data' => new AllSettingResource($settings)
        ]);
    }
/**
     * Chi tiết cài đặt
     *
     * Lấy chi tiết cài đặt.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam setting_key string required
     * id sản phẩm. Example: site_name
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": {
     *           "plain_valie": "Home page",
     *       }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($setting_key){
        $setting = $this->repository->findByOrFail('setting_key', $setting_key);
        return response()->json([
            'status' => 200,
            'msg' => __('notifySuccess'),
            'data' => new ShowSettingResource($setting)
        ]);
    }

}