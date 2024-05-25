<?php

namespace App\Models;

use App\Enums\Setting\{SettingGroup, SettingTypeInput};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    const CACHE_KEY_GET_ALL = 'cache_settings';

    protected $table = 'settings';

    protected $guarded = [];

    protected $casts = [
        'type_input' => SettingTypeInput::class,
        'group' => SettingGroup::class
    ];

    public function isTypeImage(){
        return $this->type_input == SettingTypeInput::Image;
    }

    public function getNameComponent(){
        return match($this->type_input){
            SettingTypeInput::Text => 'input',
            SettingTypeInput::Number => 'input-number',
            SettingTypeInput::Image => 'input-image-ckfinder',
            SettingTypeInput::Email => 'input-email',
            SettingTypeInput::Phone => 'input-phone',
            SettingTypeInput::Textarea => 'textarea',
            default => 'input'
        };
    }
}
