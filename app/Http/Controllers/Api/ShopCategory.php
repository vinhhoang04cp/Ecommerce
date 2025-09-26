<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopCategoryRequest;
use App\Http\Resources\ShopCategoryResource;
use App\Models\ShopCategory as ShopCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection; 
use Exception;

class ShopCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection|JsonResponse  
    {
        try {
            $perPage = $request->get('per_page', 15);
            $search = $request->get('search');
            
            $query = ShopCategoryModel::query();
            
            // Tìm kiếm theo tên nếu có
            if ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                      ->orWhere('description', 'LIKE', '%' . $search . '%');
            }
            
            // Có thể load thêm products count
            if ($request->get('with_products_count')) {
                $query->withCount('products');
            }
            
            $categories = $query->paginate($perPage);
            
            return ShopCategoryResource::collection($categories);
            
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể lấy danh sách danh mục',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopCategoryRequest $request): JsonResponse
    {
        try {
            $category = ShopCategoryModel::create($request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Tạo danh mục thành công',
                'data' => new ShopCategoryResource($category)
            ], 201);
            
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể tạo danh mục',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $category = ShopCategoryModel::with('products')->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => new ShopCategoryResource($category)
            ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy danh mục',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShopCategoryRequest $request, string $id): JsonResponse
    {
        try {
            $category = ShopCategoryModel::findOrFail($id);
            
            $category->update($request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật danh mục thành công',
                'data' => new ShopCategoryResource($category)
            ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể cập nhật danh mục',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $category = ShopCategoryModel::findOrFail($id);
            
            // Kiểm tra xem có sản phẩm nào thuộc danh mục này không
            if ($category->products()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể xóa danh mục vì còn sản phẩm thuộc danh mục này'
                ], 400);
            }
            
            $category->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Xóa danh mục thành công'
            ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể xóa danh mục',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Lấy tất cả danh mục (không phân trang) - dùng cho dropdown/select
     */
    public function all(): JsonResponse
    {
        try {
            $categories = ShopCategoryModel::select('category_id', 'name')->get();
            
            return response()->json([
                'success' => true,
                'data' => $categories
            ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể lấy danh sách danh mục',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
