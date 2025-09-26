<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    protected $table = 'inventories';

    protected $primaryKey = 'inventory_id';

    protected $fillable = [
        'product_id',
        'quantity_in_stock',
        'reserved_quantity',
        'reorder_level',
        'last_updated',
    ];

    protected $casts = [
        'quantity_in_stock' => 'integer',
        'reserved_quantity' => 'integer',
        'reorder_level' => 'integer',
        'last_updated' => 'datetime',
    ];

    /**
     * Quan hệ 1-1 với Product
     * ON DELETE CASCADE - xóa sản phẩm sẽ xóa thông tin tồn kho
     * UNIQUE(product_id) đảm bảo 1 sản phẩm có duy nhất 1 dòng tồn kho hiện hành
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    /**
     * Tính số lượng có sẵn (không bao gồm số lượng đã reserved)
     */
    public function getAvailableQuantityAttribute(): int
    {
        return $this->quantity_in_stock - $this->reserved_quantity;
    }

    /**
     * Kiểm tra xem có cần đặt hàng lại không
     */
    public function needsReorder(): bool
    {
        return $this->available_quantity <= $this->reorder_level;
    }
}
