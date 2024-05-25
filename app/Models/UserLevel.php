<?php

namespace App\Models;

use App\Enums\User\UserLevelTypeDiscount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    use HasFactory;

    protected $table = 'user_levels';

    protected $guarded = [];

    protected $casts = [
        'type_discount' => UserLevelTypeDiscount::class,
        'position' => 'integer'
    ];

    public function users(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function showPlainValue(){
        if($this->type_discount == UserLevelTypeDiscount::Amount){
            return format_price($this->plain_value);
        }
        return $this->plain_value.'%';
    }

    public function typeDiscountAmount(){
        return $this->type_discount == UserLevelTypeDiscount::Amount;
    }
}
