<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\User\{UserStatus, UserGender, UserRoles};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'slug',
        'level_id',
        'username',
        'fullname',
        'email',
        'phone',
        'birthday',
        'gender',
        'avatar',
        'address',
        'token_get_password',
        'password',
        'status',
        'roles'
    ];

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
        // 'gender' => UserGender::class,
        'status' => UserStatus::class,
        'roles' => UserRoles::class
    ];

    public function getIdOrder()
    {
        return $this->id;
    }

    public function level()
    {
        return $this->belongsTo(UserLevel::class, 'level_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function productWishlists()
    {
        return $this->belongsToMany(Product::class, 'product_wishlists', 'user_id', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }


    public function notifications()
    {
        return $this->belongsToMany(Notification::class);
    }

    public function isAgent()
    {
        return $this->isRoles(UserRoles::Agent);
    }
    public function isSeller()
    {
        return $this->isRoles(UserRoles::Seller);
    }
    public function isRoles(UserRoles $role)
    {
        return $this->roles == $role;
    }
    public function bonusSale()
    {
        return $this->hasOne(BonusSale::class, 'user_id');
    }

    public function isActive()
    {
        return $this->active == true;
    }
    public function fullname()
    {
        return $this->fullname ?: $this->email;
    }
    public function avatar()
    {
        return $this->avatar;
    }


    public function roleName()
    {
        return $this->roles->description();
    }
}
