<?php

/**
 * Form Request cho ShopCategory
 *
 * Class này xử lý validation dữ liệu đầu vào cho các thao tác tạo mới và cập nhật danh mục
 * Tự động validate dữ liệu trước khi controller xử lý request
 * Nếu validation thất bại, tự động trả về response với lỗi 422 Unprocessable Entity
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * Phương thức này kiểm tra xem người dùng có được phép thực hiện request này không
     * Trong trường hợp này, luôn cho phép (true) vì không cần kiểm tra quyền
     * Trong môi trường thực tế, nên kiểm tra quyền của người dùng (ví dụ: chỉ admin mới có thể tạo/sửa/xóa danh mục)
     *
     * @return bool true nếu được phép, false nếu không được phép
     */
    public function authorize(): bool
    {
        return true; // Cho phép tất cả request, không kiểm tra quyền
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * Phương thức này định nghĩa các quy tắc validation cho dữ liệu đầu vào
     * Các quy tắc khác nhau được áp dụng cho thao tác tạo mới và cập nhật
     *
     * Các quy tắc validation:
     * - name: Bắt buộc, là chuỗi, độ dài tối đa 150 ký tự, không trùng lặp trong bảng shop_categories
     * - description: Không bắt buộc, là chuỗi
     *
     * Đối với thao tác cập nhật, quy tắc unique bỏ qua chính bản ghi đang được cập nhật
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Quy tắc cơ bản áp dụng cho cả tạo mới và cập nhật
        $rules = [
            'name' => 'required|string|max:150', // Tên danh mục: bắt buộc, là chuỗi, tối đa 150 ký tự
            'description' => 'nullable|string',  // Mô tả: không bắt buộc, là chuỗi
        ];

        // Áp dụng quy tắc unique khác nhau tùy thuộc vào loại request
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Nếu là update, thêm rule unique với ignore current record
            // unique:table,column,except,idColumn
            $categoryId = $this->route('shop_category'); // Lấy ID từ route parameter
            $rules['name'] .= '|unique:shop_categories,name,'.$categoryId.',category_id';
        } else {
            // Nếu là create, chỉ cần unique đơn giản
            $rules['name'] .= '|unique:shop_categories,name';
        }

        return $rules;
    }
}
