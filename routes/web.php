<?php

use App\Http\Controllers\Api\ShopCategory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Shop Categories Routes - comment out for now since we're using API routes
// Route::resource('shop_categories', ShopCategory::class);
