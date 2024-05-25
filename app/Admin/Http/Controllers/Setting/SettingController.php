<?php

namespace App\Admin\Http\Controllers\Setting;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Setting\SettingRepositoryInterface;
use App\Enums\Setting\SettingGroup;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(
        SettingRepositoryInterface $repository
    ) {
        parent::__construct();
        $this->repository = $repository;
    }
    public function getView()
    {
        return [
            'general' => 'admin.settings.general'
        ];
    }
    public function general()
    {
        $settings = $this->repository->getByGroup([SettingGroup::General]);

        return view($this->view['general'], compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');
        try {
            //code...
            $this->repository->updateMultipleRecord($data);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', __('notifyFail'));
        }
        return back()->with('success', __('notifySuccess'));
    }
}
