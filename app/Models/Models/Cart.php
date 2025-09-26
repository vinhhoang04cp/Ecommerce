<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $table = 'carts';

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    /**
     * Quan hệ N-1 với User
     * ON DELETE CASCADE - xóa user sẽ xóa giỏ hàng của user
     * Ghi chú: Nếu muốn mỗi user chỉ có 1 giỏ "đang hoạt động", thêm UNIQUE(user_id) ở migration
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * Quan hệ 1-N với CartItems
     * ON DELETE CASCADE - xóa giỏ hàng sẽ xóa tất cả items trong giỏ
     */
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class, 'cart_id', 'cart_id');
    }
}
