<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use App\Enums\User\UserGender;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\ProfileRequest;

class ProfileController extends Controller
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
            'index' => 'public.auth.profile.index',
            'change_password' => 'public.auth.profile.change-password'
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'login.index'
        ];
    }

    public function index()
    {

        $auth = auth()->user();

        $breadcrums = [['label' => trans('Thông tin tài khoản')]];


        $gender = UserGender::asSelectArray();

        return view($this->view['index'], compact('auth', 'breadcrums', 'gender'));
    }

    public function update(ProfileRequest $request)
    {
        try {
            $validatedData = $request->validated();

            if ($request->hasFile('avatar')) {
                $image_name = time() . '.' . $request->avatar->extension();

                $request->avatar->move(public_path('storage/users'), $image_name);

                $path = "public/storage/users/" . $image_name;

                auth()->user()->update(array_merge($validatedData, ['avatar' => $path]));
            } else {
                auth()->user()->update($validatedData);
            }

            return back()->with('success', __('notifySuccess'));
        } catch (\Exception $e) {
            return back()->with('error', __('notifyError'));
        }
    }


    public function changePassword()
    {
        return view($this->view['change_password']);
    }

    public function handleChangePassword(ChangePasswordRequest $request)
    {

        auth()->user()->update([
            'password' => bcrypt($request->input('password'))
        ]);

        return back()->with('success', __('notifySuccess'));
    }

    public function handle(RegisterRequest $request)
    {
    }
}
