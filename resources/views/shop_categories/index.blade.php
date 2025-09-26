@extends('layouts.app')

@section('title', 'Danh sách danh mục')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-list"></i> Danh sách danh mục sản phẩm
            </h1>
            <a href="{{ route('shop_categories.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Thêm danh mục mới
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                @if($categories->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="30%">Tên danh mục</th>
                                    <th width="40%">Mô tả</th>
                                    <th width="20%" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->category_id }}</td>
                                        <td>
                                            <strong>{{ $category->name }}</strong>
                                        </td>
                                        <td>{{ Str::limit($category->description ?? 'Không có mô tả', 50) }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('shop_categories.show', $category->category_id) }}" 
                                                   class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('shop_categories.edit', $category->category_id) }}" 
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('shop_categories.destroy', $category->category_id) }}" 
                                                      method="POST" 
                                                      style="display: inline-block;"
                                                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Chưa có danh mục nào</h4>
                        <p class="text-muted">Hãy tạo danh mục đầu tiên của bạn!</p>
                        <a href="{{ route('shop_categories.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Thêm danh mục mới
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
