@extends('layouts.app')

@section('title', 'Chi tiết danh mục')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="fas fa-info-circle"></i> Chi tiết danh mục
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <strong>ID:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $category->category_id }}
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Tên danh mục:</strong>
                    </div>
                    <div class="col-md-9">
                        <span class="badge bg-primary fs-6">{{ $category->name }}</span>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Mô tả:</strong>
                    </div>
                    <div class="col-md-9">
                        @if($category->description)
                            <p class="mb-0">{{ $category->description }}</p>
                        @else
                            <em class="text-muted">Không có mô tả</em>
                        @endif
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Số lượng sản phẩm:</strong>
                    </div>
                    <div class="col-md-9">
                        <span class="badge bg-info">{{ $category->products->count() ?? 0 }} sản phẩm</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('shop_categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay lại danh sách
                    </a>
                    <div>
                        <a href="{{ route('shop_categories.edit', $category->category_id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                        <form action="{{ route('shop_categories.destroy', $category->category_id) }}" 
                              method="POST" 
                              style="display: inline-block;"
                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
