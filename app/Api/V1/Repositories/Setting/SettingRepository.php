<?php
namespace App\Api\V1\Repositories\Setting;

use App\Admin\Repositories\Setting\SettingRepository as AdminSettingRepository;
use App\Api\V1\Repositories\Setting\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingRepository extends AdminSettingRepository implements SettingRepositoryInterface
{
    public function getAll(){
        $this->instance = Cache::rememberForever(Setting::CACHE_KEY_GET_ALL, function () {
            return $this->model->get();
            // return $this->model->pluck('plain_value', 'setting_key');
        });
        return $this;
    }
    public function getValueByKey($key)
    {
        $this->instance = $this->instance->pluck('plain_value', 'setting_key');
        return $this->instance[$key] ?? null;
    }

    public function findByOrFail($column, $value){
        $this->instance = $this->model->where($column, $value)->firstOrFail();
        return $this->instance;
    }
}