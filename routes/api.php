<?php

use App\Http\Controllers\Api\ShopCategory as ShopCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Shop Categories API Routes
Route::prefix('shop-categories')->group(function () {
    Route::get('/', [ShopCategoryController::class, 'index'])->name('shop-categories.index');
    Route::post('/', [ShopCategoryController::class, 'store'])->name('shop-categories.store');
    Route::get('/all', [ShopCategoryController::class, 'all'])->name('shop-categories.all');
    Route::get('/{shop_category}', [ShopCategoryController::class, 'show'])->name('shop-categories.show');
    Route::put('/{shop_category}', [ShopCategoryController::class, 'update'])->name('shop-categories.update');
    Route::patch('/{shop_category}', [ShopCategoryController::class, 'update'])->name('shop-categories.patch');
    Route::delete('/{shop_category}', [ShopCategoryController::class, 'destroy'])->name('shop-categories.destroy');
});
