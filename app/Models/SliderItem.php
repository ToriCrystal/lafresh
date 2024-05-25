<?php

namespace App\Models;

use App\Enums\Slider\SliderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    use HasFactory;

    protected $table = 'slider_items';

    protected $guarded = [];

    protected $casts = [
        'status' => SliderStatus::class
    ];

    public function slider(){
        return $this->belongsTo(Slider::class, 'slider_id');
    }

    public function scopePublished($query){
        $query->where('status', SliderStatus::Published);
    }
}
