<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Quan hệ N-1 với Categories
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ShopCategories::class, 'category_id', 'category_id');
    }

    /**
     * Quan hệ 1-N với ProductDetails
     * ON DELETE CASCADE - xóa sản phẩm sẽ xóa toàn bộ product_details
     */
    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'product_id');
    }

    /**
     * Quan hệ 1-N với CartItems
     * ON DELETE RESTRICT - không được xóa sản phẩm nếu còn trong giỏ hàng
     */
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class, 'product_id', 'product_id');
    }

    /**
     * Quan hệ 1-N với OrderItems
     * ON DELETE RESTRICT - không được xóa sản phẩm nếu còn trong đơn hàng
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'product_id');
    }

    /**
     * Quan hệ 1-1 với Inventory
     * ON DELETE CASCADE - xóa sản phẩm sẽ xóa thông tin tồn kho
     */
    public function inventory(): HasOne
    {
        return $this->hasOne(Inventory::class, 'product_id', 'product_id');
    }
}
