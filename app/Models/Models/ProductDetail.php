<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDetail extends Model
{
    protected $table = 'product_details';

    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'product_id',
        'attribute_name',
        'attribute_value',
    ];

    /**
     * Quan hệ N-1 với Product
     * ON DELETE CASCADE - xóa sản phẩm sẽ xóa toàn bộ product_details
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
