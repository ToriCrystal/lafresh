<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Mail\Auth\ResetPassword;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    //
    public function __construct(
        UserRepositoryInterface $repository,
        AuthServiceInterface $service
    )
    {
        parent::__construct();
        $this->repository = $repository;
        $this->service = $service;
    }
    public function getView()
    {
        return [
            'index' => 'public.auth.forgot_password.index',
            'send_mail_success' => 'public.auth.forgot_password.send-mail-success',
            'reset' => 'public.auth.forgot_password.reset'
        ];
    }

    public function getroute()
    {
        return [
            'reset' => 'reset_password.reset',
            'login' => 'login.index',
        ];
    }

    public function index(){
        return view($this->view['index']);
    }

    public function handle(ResetPasswordRequest $request){

        $instance = $this->service->updateTokenPassword($request)
        ->generateRouteGetPassword($this->route['reset'])
        ->getInstance();
        
        Mail::to($instance['user'])->send(new ResetPassword($instance['user'], $instance['url']));

        return view($this->view['send_mail_success'])->with('success', __('notifySuccess'));
    }

    public function reset(ResetPasswordRequest $request){

        $data = $request->validated();

        return view($this->view['reset'], $data);
    }

    public function update(ResetPasswordRequest $request){

        $this->service->updatePassword($request);

        return to_route($this->route['login'])->with('success', __('notifySuccess'));
    }
}
