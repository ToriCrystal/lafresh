<?php

namespace App\Models;

use App\Enums\ProductCategory\ProductCategoryShowHome;
use App\Enums\ProductCategory\ProductCategoryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\Eloquent\Sluggable;
use Kalnoy\Nestedset\NodeTrait;

class ProductCategory extends Model
{
    use HasFactory, Sluggable, NodeTrait;

    protected $table = 'product_categories';

    protected $guarded = [];

    protected $casts = [
        'status' => ProductCategoryStatus::class,
        'show_home' => ProductCategoryShowHome::class
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_categories_products', 'category_id', 'product_id')
        ->orderBy('id', 'DESC');
    }

    public function scopeWhereIdOrSlug($query, $idOrSlug){
        return $query->where('id', $idOrSlug)->orWhere('slug', $idOrSlug);
    }

    public function admins(){
        return $this->belongsToMany(Admin::class, 'admin_product_categories', 'product_category_id', 'admin_id');
    }

    public function scopePublished($query){
        $query->whereStatus(ProductCategoryStatus::Published);
    }

    public function scopeHasShowHome($query){
        $query->where('show_home', ProductCategoryShowHome::Yes);
    }
}
