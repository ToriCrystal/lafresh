<?php
namespace App\Repositories\Setting;

use App\Admin\Repositories\Setting\SettingRepository as AdminSettingRepository;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingRepository extends AdminSettingRepository implements SettingRepositoryInterface
{
    
    public function getAll(){
        $this->instance = Cache::rememberForever(Setting::CACHE_KEY_GET_ALL, function () {
            return $this->model->pluck('plain_value', 'setting_key');
        });
        return $this;
    }
    public function getValueByKey($key)
    {
        $this->getAll();
        return $this->instance[$key] ?? '';
    }

    public function findOrFail($id){
        $this->instance = $this->model->findOrFail($id);
        return $this->instance;
    }
}