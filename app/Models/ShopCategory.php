<?php
/**
 * Model ShopCategory
 * 
 * Model này đại diện cho bảng shop_categories trong cơ sở dữ liệu
 * Quản lý các danh mục sản phẩm trong hệ thống e-commerce
 * Có mối quan hệ 1-N với model Product (một danh mục có nhiều sản phẩm)
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShopCategory extends Model
{
    /**
     * Tên bảng trong database liên kết với model này
     * @var string
     */
    protected $table = 'shop_categories';

    /**
     * Tên cột primary key, khác với mặc định 'id'
     * @var string
     */
    protected $primaryKey = 'category_id';

    /**
     * Không sử dụng timestamps (created_at, updated_at)
     * @var bool
     */
    public $timestamps = false; // Không có timestamps trong migration

    /**
     * Các trường có thể gán hàng loạt (mass assignable)
     * Cho phép các trường này được điền trong các thao tác create() hoặc update()
     * @var array
     */
    protected $fillable = [
        'name',        // Tên danh mục
        'description', // Mô tả danh mục
    ];

    /**
     * Quan hệ 1-N với Products
     * 
     * Quan hệ này định nghĩa rằng một danh mục có thể có nhiều sản phẩm
     * Trong database, mối quan hệ này được thể hiện bằng khóa ngoại category_id trong bảng products
     * 
     * ON DELETE RESTRICT - không được xóa category nếu còn sản phẩm thuộc danh mục
     * Ràng buộc này được thực thi ở cả tầng database và tầng ứng dụng (xem phương thức destroy trong controller)
     * 
     * @return HasMany Quan hệ HasMany với model Product
     */
    public function products(): HasMany
    {
        return $this->hasMany(
            Product::class,         // Model liên quan
            'category_id',          // Khóa ngoại trong bảng products
            'category_id'           // Khóa chính trong bảng shop_categories
        );
    }
}
