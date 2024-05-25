<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusPolicyDetail extends Model
{
    use HasFactory;

    protected $table = 'bonus_policy_details';

    protected $guarded = [];

    public $timestamps = false;

    public function bonusPolicy(){
        return $this->belongsTo(BonusPolicy::class, 'bonus_policy_id', 'id');
    }
}
