<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class MenuItem extends Model
{
    use HasFactory, NodeTrait;

    protected $table ='menu_items';

    protected $guarded = [];

    public function reference()
    {
        return $this->morphTo();
    }

    public function titleReferenceType(){
        return match($this->reference_type){
            ProductCategory::class => trans('Danh mục'),
            PostCategory::class => trans('Chuyên mục'),
            Post::class => trans('Bài viết'),
            Page::class => trans('Trang'),
            Product::class => trans('Sản phẩm'),
            default => trans('Link')
        };
    }

    public function getUrl(){
        return match($this->reference_type){
            ProductCategory::class => route('product_category.show',  $this->reference->slug),
            PostCategory::class => route('post_category.show',  $this->reference->slug),
            Post::class => route('post.show',  $this->reference->slug),
            Page::class => route('page.show', $this->reference->slug),
            Product::class => route('product.show',  $this->reference->slug),
            default => url($this->url)
        };
    }

    public function hasChild(){
        return $this->children->count() > 0;
    }
}
