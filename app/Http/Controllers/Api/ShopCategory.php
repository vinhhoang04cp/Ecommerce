<?php
/**
 * API Controller cho quản lý danh mục cửa hàng (ShopCategory)
 * 
 * Controller này cung cấp các endpoints RESTful API để thao tác với danh mục cửa hàng:
 * - Lấy danh sách danh mục (có phân trang và tìm kiếm)
 * - Tạo danh mục mới
 * - Xem chi tiết một danh mục
 * - Cập nhật danh mục
 * - Xóa danh mục
 * - Lấy tất cả danh mục (không phân trang) để dùng cho dropdown/select
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopCategoryRequest; // Form request để validate dữ liệu đầu vào
use App\Http\Resources\ShopCategoryResource; // Resource để định dạng dữ liệu đầu ra
use App\Models\ShopCategory as ShopCategoryModel; // Model ShopCategory
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection; 
use Exception;

class ShopCategory extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * Phương thức này trả về danh sách các danh mục với khả năng phân trang và tìm kiếm
     * 
     * @param Request $request Request chứa các tham số truy vấn:
     *      - per_page: Số lượng mục trên mỗi trang (mặc định: 15)
     *      - search: Chuỗi tìm kiếm (tìm trong name và description)
     *      - with_products_count: Nếu có, sẽ thêm số lượng sản phẩm của mỗi danh mục
     * 
     * @return AnonymousResourceCollection|JsonResponse Collection danh mục đã được transform qua ShopCategoryResource
     *      hoặc JsonResponse với thông báo lỗi nếu xảy ra exception
     */
    public function index(Request $request): AnonymousResourceCollection|JsonResponse  
    {
        try {
            // Lấy tham số phân trang và tìm kiếm từ request
            $perPage = $request->get('per_page', 15); // Mặc định: 15 mục/trang
            $search = $request->get('search');
            
            // Khởi tạo query builder cho model ShopCategoryModel
            $query = ShopCategoryModel::query();
            
            // Thêm điều kiện tìm kiếm nếu có tham số search
            if ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                      ->orWhere('description', 'LIKE', '%' . $search . '%');
            }
            
            // Đếm số lượng sản phẩm trong mỗi danh mục nếu có yêu cầu
            if ($request->get('with_products_count')) {
                $query->withCount('products'); // Thêm products_count vào kết quả
            }
            
            // Thực hiện phân trang và lấy kết quả
            $categories = $query->paginate($perPage);
            
            // Trả về collection đã được transform qua ShopCategoryResource
            // Tự động được đóng gói với meta data phân trang
            return ShopCategoryResource::collection($categories);
            
        } catch (Exception $e) {
            // Xử lý ngoại lệ và trả về thông báo lỗi
            return response()->json([
                'success' => false,
                'message' => 'Không thể lấy danh sách danh mục',
                'error' => $e->getMessage()
            ], 500); // HTTP status 500: Internal Server Error
        }
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Phương thức này tạo một danh mục mới trong cơ sở dữ liệu
     * Dữ liệu đầu vào được validate thông qua ShopCategoryRequest
     * 
     * @param ShopCategoryRequest $request Request đã validate chứa dữ liệu của danh mục mới
     *      - name: Tên danh mục (required, unique, max:150)
     *      - description: Mô tả danh mục (nullable)
     * 
     * @return JsonResponse Response với kết quả tạo danh mục
     *      - success: true/false
     *      - message: Thông báo kết quả
     *      - data: Dữ liệu danh mục đã tạo (nếu thành công)
     *      - error: Thông báo lỗi (nếu thất bại)
     */
    public function store(ShopCategoryRequest $request): JsonResponse
    {
        try {
            // Tạo danh mục mới với dữ liệu đã được validate
            // $request->validated() chỉ lấy các trường đã được định nghĩa trong rules()
            $category = ShopCategoryModel::create($request->validated());
            
            // Trả về response thành công với dữ liệu danh mục đã tạo
            return response()->json([
                'success' => true,
                'message' => 'Tạo danh mục thành công',
                'data' => new ShopCategoryResource($category) // Transform dữ liệu qua resource
            ], 201); // HTTP status 201: Created
            
        } catch (Exception $e) {
            // Xử lý ngoại lệ và trả về thông báo lỗi
            return response()->json([
                'success' => false,
                'message' => 'Không thể tạo danh mục',
                'error' => $e->getMessage()
            ], 500); // HTTP status 500: Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     * 
     * Phương thức này hiển thị thông tin chi tiết của một danh mục, bao gồm các sản phẩm liên quan
     * 
     * @param string $id ID của danh mục cần hiển thị
     * 
     * @return JsonResponse Response với dữ liệu của danh mục
     *      - success: true/false
     *      - data: Dữ liệu danh mục và các sản phẩm liên quan (nếu thành công)
     *      - message: Thông báo lỗi (nếu thất bại)
     *      - error: Chi tiết lỗi (nếu thất bại)
     */
    public function show(string $id): JsonResponse
    {
        try {
            // Tìm danh mục theo ID và eager load quan hệ products
            // findOrFail sẽ tự động throw ModelNotFoundException nếu không tìm thấy
            $category = ShopCategoryModel::with('products')->findOrFail($id);
            
            // Trả về response thành công với dữ liệu danh mục
            return response()->json([
                'success' => true,
                'data' => new ShopCategoryResource($category) // Transform dữ liệu qua resource
            ], 200); // HTTP status 200: OK
            
        } catch (Exception $e) {
            // Xử lý ngoại lệ và trả về thông báo lỗi
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy danh mục',
                'error' => $e->getMessage()
            ], 404); // HTTP status 404: Not Found
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * Phương thức này cập nhật thông tin của một danh mục đã tồn tại
     * Dữ liệu đầu vào được validate thông qua ShopCategoryRequest
     * Validate đảm bảo tên danh mục unique, nhưng bỏ qua chính danh mục đang được cập nhật
     * 
     * @param ShopCategoryRequest $request Request đã validate chứa dữ liệu cập nhật
     * @param string $id ID của danh mục cần cập nhật
     * 
     * @return JsonResponse Response với kết quả cập nhật danh mục
     *      - success: true/false
     *      - message: Thông báo kết quả
     *      - data: Dữ liệu danh mục sau khi cập nhật (nếu thành công)
     *      - error: Thông báo lỗi (nếu thất bại)
     */
    public function update(ShopCategoryRequest $request, string $id): JsonResponse
    {
        try {
            // Tìm danh mục theo ID
            // findOrFail sẽ tự động throw ModelNotFoundException nếu không tìm thấy
            $category = ShopCategoryModel::findOrFail($id);
            
            // Cập nhật danh mục với dữ liệu đã được validate
            // $request->validated() chỉ lấy các trường đã được định nghĩa trong rules()
            $category->update($request->validated());
            
            // Trả về response thành công với dữ liệu danh mục đã cập nhật
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật danh mục thành công',
                'data' => new ShopCategoryResource($category) // Transform dữ liệu qua resource
            ], 200); // HTTP status 200: OK
            
        } catch (Exception $e) {
            // Xử lý ngoại lệ và trả về thông báo lỗi
            return response()->json([
                'success' => false,
                'message' => 'Không thể cập nhật danh mục',
                'error' => $e->getMessage()
            ], 500); // HTTP status 500: Internal Server Error
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * Phương thức này xóa một danh mục khỏi cơ sở dữ liệu
     * Không cho phép xóa danh mục nếu còn sản phẩm thuộc danh mục đó
     * (tuân theo nguyên tắc ON DELETE RESTRICT trong mối quan hệ)
     * 
     * @param string $id ID của danh mục cần xóa
     * 
     * @return JsonResponse Response với kết quả xóa danh mục
     *      - success: true/false
     *      - message: Thông báo kết quả
     *      - error: Thông báo lỗi (nếu thất bại)
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            // Tìm danh mục theo ID
            $category = ShopCategoryModel::findOrFail($id);
            
            // Kiểm tra xem có sản phẩm nào thuộc danh mục này không
            // exists() kiểm tra có bản ghi nào trong relationship hay không
            if ($category->products()->exists()) {
                // Nếu có sản phẩm thuộc danh mục, không cho phép xóa
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể xóa danh mục vì còn sản phẩm thuộc danh mục này'
                ], 400); // HTTP status 400: Bad Request
            }
            
            // Xóa danh mục nếu không có sản phẩm liên quan
            $category->delete();
            
            // Trả về response thành công
            return response()->json([
                'success' => true,
                'message' => 'Xóa danh mục thành công'
            ], 200); // HTTP status 200: OK
            
        } catch (Exception $e) {
            // Xử lý ngoại lệ và trả về thông báo lỗi
            return response()->json([
                'success' => false,
                'message' => 'Không thể xóa danh mục',
                'error' => $e->getMessage()
            ], 500); // HTTP status 500: Internal Server Error
        }
    }

    /**
     * Lấy tất cả danh mục (không phân trang) - dùng cho dropdown/select
     * 
     * Phương thức này trả về tất cả danh mục mà không phân trang
     * Chỉ trả về các trường cần thiết (category_id và name) để sử dụng trong dropdown/select box
     * Khác với phương thức index() ở chỗ không phân trang, không tìm kiếm, và chỉ lấy các trường cần thiết
     * 
     * @return JsonResponse Response với danh sách tất cả danh mục
     *      - success: true/false
     *      - data: Danh sách danh mục (nếu thành công)
     *      - message: Thông báo lỗi (nếu thất bại)
     *      - error: Chi tiết lỗi (nếu thất bại)
     */
    public function all(): JsonResponse
    {
        try {
            // Lấy tất cả danh mục, chỉ chọn các trường cần thiết cho dropdown
            // select() để tối ưu hiệu suất query khi chỉ cần một số trường
            $categories = ShopCategoryModel::select('category_id', 'name')->get();
            
            // Trả về response thành công với danh sách danh mục
            // Không sử dụng resource vì chỉ cần dữ liệu đơn giản
            return response()->json([
                'success' => true,
                'data' => $categories
            ], 200); // HTTP status 200: OK
            
        } catch (Exception $e) {
            // Xử lý ngoại lệ và trả về thông báo lỗi
            return response()->json([
                'success' => false,
                'message' => 'Không thể lấy danh sách danh mục',
                'error' => $e->getMessage()
            ], 500); // HTTP status 500: Internal Server Error
        }
    }
}
