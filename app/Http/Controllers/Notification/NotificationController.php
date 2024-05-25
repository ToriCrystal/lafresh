<?php

namespace App\Http\Controllers\Notification;

use App\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function getView()
    {
        return [
            'index' => 'public.notification.index',
        ];
    }

    public function getRoute()
    {
        return [

            'index' => 'notification.index',
        ];
    }

    public function index()
    {

        if (Auth::check()) {
            $user = Auth::user();
            $notify = $user->notifications()->orderBy('created_at', 'desc')->get();
        } else {
            $notify = null;
        }

        return view($this->view['index'], ['notify' => $notify]);
    }
}
