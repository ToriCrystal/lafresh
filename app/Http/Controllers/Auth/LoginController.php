<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
// use App\Admin\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
            'index' => 'public.auth.login'
        ];
    }

    public function getRoute()
    {
        return [
            'home' => 'home.index'
        ];
    }

    public function index()
    {
        return view($this->view['index']);
    }

    public function handle(LoginRequest $request)
    {

        // dd($request);
        if (Auth::attempt($request->validated())) {

            $auth = Auth::user();

            if ($auth->isActive()) {

                $request->session()->regenerate();

                return to_route($this->route['home'])->with('success', __('LoginSuccess'));
            }

            Auth::logout();
            return back()->withInput()->with('error', __('notActiveAccount'));
        }
        return back()->withInput()->with('error', __('LoginFail'));
    }
}
