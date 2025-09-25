<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShopCategories extends Model
{
    protected $table = 'shop_categories';
    
    protected $primaryKey = 'category_id';
    
    protected $fillable = [
        'name',
        'description',
        'image'
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
