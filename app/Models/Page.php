<?php

namespace App\Models;

use App\Support\Eloquent\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'pages';
    
    protected $columnSlug = 'title';
    
    protected $guarded = [];

    public function scopeWhereIdOrSlug($query, $idOrSlug){
        return $query->where('id', $idOrSlug)->orWhere('slug', $idOrSlug);
    }
}
