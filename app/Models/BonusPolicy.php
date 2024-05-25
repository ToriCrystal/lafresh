<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Product\ProductUnit;

class BonusPolicy extends Model
{
    use HasFactory;

    protected $table = 'bonus_policies';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'unit' => ProductUnit::class,
    ];

    public function detail(){
        return $this->hasMany(BonusPolicyDetail::class, 'bonus_policy_id', 'id');
    }
}
