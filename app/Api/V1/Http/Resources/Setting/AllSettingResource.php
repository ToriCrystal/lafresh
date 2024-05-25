<?php

namespace App\Api\V1\Http\Resources\Setting;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllSettingResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->mapWithKeys(function($setting){
            return [
                $setting->setting_key => $setting->isTypeImage() ? asset($setting->plain_value) : $setting->plain_value,
            ];
            
        });
    }

    
}
