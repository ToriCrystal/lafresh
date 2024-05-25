<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout(Request $request){

        auth('admin')->logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.index')->with('success', __('Bạn đã đăng xuất thành công.'));
    }
}
