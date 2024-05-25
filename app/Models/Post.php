<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\Eloquent\Sluggable;
use App\Enums\Post\{PostStatus};

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'posts';
    protected $guarded = [];
    protected $columnSlug = 'title';

    protected $casts = [
        'status' => PostStatus::class,
    ];

    public function isPublished(){
        return $this->status == PostStatus::Published;
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'categories_posts', 'post_id', 'category_id');
    }

    public function scopePublished($query){
        return $query->where('status', PostStatus::Published);
    }

    public function scopeHasCategories($query, array $categoriesId){
        return $query->whereHas('categories', function($query) use($categoriesId) {
            $query->whereIn('id', $categoriesId);
        });
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'id');
    }
}
