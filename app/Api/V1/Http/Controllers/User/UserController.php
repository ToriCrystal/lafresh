<?php

namespace App\Api\V1\Http\Controllers\User;

use App\Admin\Http\Controllers\Controller;
use \Illuminate\Http\Request;

/**
 * @group Người dùng
 */

class UserController extends Controller
{
  
    /**
     * Đăng ký
     *
     * Tạo mới 1 user.
     *
     * @bodyParam fullname string required
     * Họ và tên của bạn. Example: Nguyen Van A
     *
     * @bodyParam phone string required
     * Số điện thoại của bạn(Đúng định dạng số điện thoại). Example: 0999999999
     * 
     * @bodyParam email email required
     * Email Của bạn. Example: example@gmail.com
     * 
     * @bodyParam password string required
     * Mật khẩu của bạn. Example: 123456
     * 
     * @bodyParam password_confirmation string required
     * Nhập lại mật khẩu của bạn. Example: 123456
     *
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công."
     * }
     * @response 400 {
     *      "status": 400,
     *      "message": "Thực hiện không thành công."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        return response()->json([
            'status' => 200,
            'data' => $request->user()
        ]);
    }
}
