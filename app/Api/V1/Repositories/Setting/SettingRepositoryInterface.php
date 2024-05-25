<?php

namespace App\Api\V1\Repositories\Setting;

interface SettingRepositoryInterface
{
    public function getAll();

    public function getValueByKey($key);
    public function findByOrFail($column, $value);
}