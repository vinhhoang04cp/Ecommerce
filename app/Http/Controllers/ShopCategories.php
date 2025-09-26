<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCategoryRequest;
use App\Models\ShopCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShopCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = ShopCategory::all(); // Lấy tất cả danh mục

        return view('shop_categories.index', compact('categories')); // quay về view và truyền dữ liệu danh mục
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('shop_categories.create');  // trả về view tạo mới danh mục
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopCategoryRequest $request): RedirectResponse   // nhận dữ liệu từ form tạo mới danh mục, sử dụng ShopCategoryRequest để xác thực dữ liệu
    {
        ShopCategory::create($request->validated());  // tạo mới danh mục với dữ liệu đã được xác thực

        return redirect()->route('shop_categories.index')
            ->with('success', 'Danh mục đã được tạo thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $category = ShopCategory::findOrFail($id);   // Tìm danh mục theo ID hoặc trả về lỗi 404 nếu không tìm thấy

        return view('shop_categories.show', compact('category'));  // trả về view chi tiết danh mục và truyền dữ liệu danh mục
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $category = ShopCategory::findOrFail($id);  // Tìm danh mục theo ID hoặc trả về lỗi 404 nếu không tìm thấy

        return view('shop_categories.edit', compact('category'));  // trả về view chỉnh sửa danh mục và truyền dữ liệu danh mục
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShopCategoryRequest $request, string $id): RedirectResponse
    {
        $category = ShopCategory::findOrFail($id);  // Tìm danh mục theo ID hoặc trả về lỗi 404 nếu không tìm thấy
        $category->update($request->validated());  // Cập nhật danh mục với dữ liệu đã được xác thực

        return redirect()->route('shop_categories.index')
            ->with('success', 'Danh mục đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = ShopCategory::findOrFail($id);

        // Kiểm tra xem có sản phẩm nào thuộc danh mục này không
        if ($category->products()->count() > 0) {
            return redirect()->route('shop_categories.index')
                ->with('error', 'Không thể xóa danh mục này vì còn có sản phẩm thuộc danh mục!');
        }

        $category->delete();

        return redirect()->route('shop_categories.index')
            ->with('success', 'Danh mục đã được xóa thành công!');
    }
}
