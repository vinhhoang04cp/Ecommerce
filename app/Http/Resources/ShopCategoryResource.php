<?php
/**
 * Resource cho ShopCategory
 * 
 * Class này xác định cách dữ liệu ShopCategory được chuyển đổi thành định dạng JSON
 * Giúp đồng nhất định dạng dữ liệu trả về qua API và kiểm soát các trường được hiển thị
 * Laravel Resource giúp tách biệt logic hiển thị dữ liệu ra khỏi controller
 */

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * 
     * Phương thức này định nghĩa cách chuyển đổi model ShopCategory thành mảng dữ liệu
     * cho response JSON. Các trường được chọn lọc và định dạng theo nhu cầu.
     * 
     * Các trường trả về:
     * - category_id: ID của danh mục
     * - name: Tên danh mục
     * - description: Mô tả danh mục
     * - products_count: Số lượng sản phẩm (chỉ khi có withCount('products') trong query)
     * - products: Danh sách sản phẩm (chỉ khi có with('products') trong query)
     *
     * @param Request $request Request hiện tại
     * @return array<string, mixed> Mảng dữ liệu được chuyển đổi
     */
    public function toArray(Request $request): array
    {
        return [
            'category_id' => $this->category_id,  // ID của danh mục
            'name' => $this->name,                // Tên danh mục
            'description' => $this->description,   // Mô tả danh mục
            
            // Số lượng sản phẩm: chỉ hiển thị khi có withCount('products') trong query
            // when() chỉ thêm trường này vào response khi điều kiện đầu tiên là true
            'products_count' => $this->when(isset($this->products_count), $this->products_count),
            
            // Danh sách sản phẩm: chỉ hiển thị khi có with('products') trong query
            // relationLoaded() kiểm tra xem quan hệ có được load hay không
            'products' => $this->when($this->relationLoaded('products'), $this->products),
        ];
    }
}
