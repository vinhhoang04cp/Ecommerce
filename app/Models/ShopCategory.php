<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShopCategory extends Model
{
    protected $table = 'shop_categories';

    protected $primaryKey = 'category_id';

    public $timestamps = false; // Không có timestamps trong migration

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Quan hệ 1-N với Products
     * ON DELETE RESTRICT - không được xóa category nếu còn sản phẩm thuộc danh mục
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
