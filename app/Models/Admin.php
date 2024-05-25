<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Enums\Admin\AdminRoles;

class Admin extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles' => AdminRoles::class,
        'gender' => 'integer',
    ];

    public function isSuperAdmin(){
        return $this->isRoles(AdminRoles::SuperAdmin);
    }
    public function isAdmin(){
        return $this->isRoles(AdminRoles::Admin);
    }
    public function isRoles(AdminRoles $role){
        return $this->roles == $role;
    }
    public function rolesIn(array $roles){
        foreach($roles as $item){
            if($this->roles == $item){
                return true;
            }
        }
        return false;
    }

    public function productCategories(){
        return $this->belongsToMany(ProductCategory::class, 'admin_product_categories', 'admin_id', 'product_category_id');
    }
}
