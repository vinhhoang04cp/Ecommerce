<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $table = 'order_items';
    
    protected $primaryKey = 'item_id';
    
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price' // Đơn giá tại thời điểm đặt hàng (không phụ thuộc giá hiện tại của products)
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer'
    ];

    /**
     * Quan hệ N-1 với Order
     * ON DELETE CASCADE - xóa đơn hàng sẽ xóa tất cả items trong đơn hàng
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    /**
     * Quan hệ N-1 với Product
     * ON DELETE RESTRICT - không được xóa sản phẩm nếu còn trong đơn hàng
     * Lưu ý: price là đơn giá tại thời điểm đặt hàng, không thay đổi theo giá hiện tại
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    /**
     * Tính tổng tiền của item này
     */
    public function getTotalAttribute(): float
    {
        return $this->price * $this->quantity;
    }
}
