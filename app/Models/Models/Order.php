<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $table = 'orders';
    
    protected $primaryKey = 'order_id';
    
    protected $fillable = [
        'user_id',
        'order_date',
        'status',
        'total_amount',
        'shipping_address',
        'payment_method'
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'total_amount' => 'decimal:2'
    ];

    /**
     * Quan hệ N-1 với User
     * ON DELETE RESTRICT - không được xóa user nếu còn đơn hàng
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * Quan hệ 1-N với OrderItems
     * ON DELETE CASCADE - xóa đơn hàng sẽ xóa tất cả items trong đơn hàng
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }
}
