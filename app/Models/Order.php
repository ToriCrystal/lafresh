<?php

namespace App\Models;

use App\Enums\Order\OrderPaymentMethod;
use App\Enums\Order\OrderShippingMethod;
use App\Enums\Order\OrderStatus;
use App\Enums\User\UserRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];

    protected $casts = [
        'status' => OrderStatus::class,
        'customer_role' => UserRoles::class,
        'payment_method' => OrderPaymentMethod::class,
        'shipping_method' => OrderShippingMethod::class,
        'payment_status' => OrderStatus::class,
    ];

    public function isCompleted()
    {
        return $this->status == OrderStatus::Completed;
    }

    public function isCancel(){
        return $this->status == OrderStatus::Unprocessed;
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeCurrentAuth($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }
}
