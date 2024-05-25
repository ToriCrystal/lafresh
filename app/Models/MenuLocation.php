<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLocation extends Model
{
    use HasFactory;

    protected $table ='menu_locations';

    protected $guarded = [];

    public function menu(){
        return $this->hasOne(Menu::class, 'menu_id');
    }
}
