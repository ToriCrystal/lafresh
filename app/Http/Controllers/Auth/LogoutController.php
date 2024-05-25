<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return to_route('home.index')->with('success', trans('Bạn đã đăng xuất thành công.'));
    }
}
