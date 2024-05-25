<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use App\Http\Requests\Auth\ChangePasswordRequest;

class SecurityController extends Controller
{
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
            'change_password' => 'public.auth.security.change-password'
        ];
    }

    public function getRoute()
    {
        return [

        ];
    }

    public function changePassword(){

        $breadcrums = [['label' => trans('Bảo mật tài khoản')]];

        return view($this->view['change_password'], compact('breadcrums'));
    }

    public function handleChangePassword(ChangePasswordRequest $request){

        auth()->user()->update([
            'password' => bcrypt($request->input('password'))
        ]);

        return back()->with('success', __('notifySuccess'));
    }
}