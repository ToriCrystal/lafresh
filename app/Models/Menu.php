<?php

namespace App\Models;

use App\Support\Eloquent\Sluggable;
use App\Enums\DefaultStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, Sluggable;

    protected $table ='menus';

    protected $guarded = [];

    protected $casts = [
        'status' => DefaultStatus::class
    ];

    public function items(){
        return $this->hasMany(MenuItem::class, 'menu_id', 'id')->orderBy('position', 'asc');
    }

    public function locations(){
        return $this->hasMany(MenuLocation::class, 'menu_id', 'id');
    }

    public function scopePublished($query){
        $query->where('status', DefaultStatus::Published);
    }
}
