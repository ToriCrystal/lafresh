<?php

namespace App\Api\V1\Http\Controllers;

use App\Admin\Http\Controllers\Controller;
use App\Api\V1\Http\Requests\RegisterInfoSendEmailRequest;
use App\Api\V1\Mail\RegisterInfoSendMail;
use App\Api\V1\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Support\Facades\Mail;

/**
 * @group Thong bao dang ky email
 */

class RegisterInfoSendEmailController extends Controller
{
    public $repoSetting;
    public function __construct(
        SettingRepositoryInterface $repoSetting
    )
    {
        $this->repoSetting = $repoSetting;
    }

    /**
     * Gửi thông báo đến mail
     *
     * Gửi thông tin đăng ký đến mail admin
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Example: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @bodyParam fullname string required
     * Họ và tên. Example: Nguyen Van A
     * 
     * @bodyParam email string required
     * Email người dùng. Example: example@gmail.com
     * 
     * @bodyParam phone string required
     * Số điện thoại người dùng. Example: example@gmail.com
     * 
     * @bodyParam address string required
     * Địa chỉ người dùng. Example: 998/42/15 Quang Trung
     * 
     * @bodyParam message string
     * Lời nhắn. Example: You send message
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

    public function sendMail(RegisterInfoSendEmailRequest $request){
        // return $this->repoSetting->getAll()->getInstance();
        Mail::to($this->repoSetting->getAll()->getValueByKey('email'))->send(new RegisterInfoSendMail($request->validated()));
        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess')
        ]);
    }
}