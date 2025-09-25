<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $table = 'cart_items';
    
    protected $primaryKey = 'item_id';
    
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer'
    ];

    /**
     * Quan hệ N-1 với Cart
     * ON DELETE CASCADE - xóa giỏ hàng sẽ xóa tất cả items trong giỏ
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    /**
     * Quan hệ N-1 với Product
     * ON DELETE RESTRICT - không được xóa sản phẩm nếu còn trong giỏ hàng
     * UNIQUE(cart_id, product_id) tránh trùng sản phẩm trong cùng 1 giỏ (định nghĩa ở migration)
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
