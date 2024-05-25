<?php

namespace App\Models;

use App\Enums\Category\CategoryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use App\Support\Eloquent\Sluggable;

class Category extends Model
{
    use HasFactory, NodeTrait, Sluggable;

    protected $table = 'categories';

    protected $guarded = [];

    protected $casts = [
        'status' => CategoryStatus::class
    ];

//    public function posts(){
//        return $this->belongsToMany(Post::class, 'categories_posts', 'category_id', 'post_id');
//    }
    public function products(){
        return $this->belongsToMany(Product::class, 'products_categories', 'category_id', 'product_id')
            ->orderBy('id', 'DESC');
    }

    public function scopePublished($query){
        return $query->where('status', CategoryStatus::Published);
    }
}
