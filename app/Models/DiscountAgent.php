<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class DiscountAgent extends Model
{
    use HasFactory;
    protected $table = 'discount_agents';

    protected $guarded = [];
    
    public $timestamps = false;

    protected $casts = [
        'discount_data' => AsArrayObject::class
    ];
}

