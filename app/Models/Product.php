<?php

namespace App\Models;

use App\Enums\Product\{ProductFeature, ProductUnit, ProductInstock, ProductNew, ProductStatus}; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\Eloquent\Sluggable;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'products';
    protected $guarded = [];

    protected $casts = [
        'status' => ProductStatus::class,
        'in_stock' => ProductInstock::class,
        'gallery' => AsArrayObject::class,
        'feature' => ProductFeature::class,
        'new' => ProductNew::class,
        'unit' => ProductUnit::class
    ];

    public function findOnePurchaseFollowQty($qty){
        if($this->purchaseQty){
            return $this->purchaseQty->where('qty', '<=', $qty)->sortByDesc('qty')->first();
        }
        return null;
    }

    public function userWishlists(){
        return $this->belongsToMany(User::class, 'product_wishlists', 'product_id', 'user_id');
    }

    public function categories(){
        return $this->belongsToMany(ProductCategory::class, 'product_categories_products', 'product_id', 'category_id')->orderBy('position', 'asc');
    }

    public function purchaseQty(){
        return $this->hasMany(ProductPurchaseQty::class, 'product_id', 'id');
    }
    public function scopePublished($query){
        return $query->where('status', ProductStatus::Published);
    }
    public function scopeStocking($query){
        return $query->where('in_stock', ProductInstock::Yes);
    }

    public function scopeIsFeature($query){
        return $query->where('feature', ProductFeature::Yes);
    }

    public function scopeIsNew($query){
        return $query->where('new', ProductNew::Yes);
    }

    public function isPail(){
        return $this->isUnit(ProductUnit::Pail);
    }
    public function isBottle(){
        return $this->isUnit(ProductUnit::Bottle);
    }
    public function isUnit(ProductUnit $role){
        return $this->roles == $role;
    }

    public function discountSeller(){
        return $this->hasMany(DiscountSeller::class, 'product_id');
    }

    public function badgeStock(){

        return $this->in_stock == true ? 'bg-cyan-lt' : 'bg-warning-lt';
    }

    public function labelStock(){
        return $this->in_stock == true ? trans('Còn hàng') : trans('Hết hàng');
    }


    public function gallery(){
        $arr = [$this->feature_image];
        if($this->gallery){
            $arr = array_merge($arr, $this->gallery->toArray());
        }
        return array_unique($arr);
    }
}
