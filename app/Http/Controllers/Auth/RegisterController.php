<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use App\Enums\User\UserGender;
use App\Enums\User\UserRoles;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;

class RegisterController extends Controller
{
    public function __construct(
        UserRepositoryInterface $repository,
        AuthServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'public.auth.register'
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'register.index',
            'login' => 'login.index'
        ];
    }

    public function index()
    {
        return view($this->view['index'], [
            'roles' => UserRoles::asSelectArray(),
            'gender' => UserGender::asSelectArray()
        ]);
    }

    public function handle(RegisterRequest $request)
    {

        $user = $this->service->register($request);

        if ($user) {
            return to_route($this->route['login'])->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyError'));
    }
}
