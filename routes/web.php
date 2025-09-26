<?php

use App\Http\Controllers\ShopCategories;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Shop Categories Routes
Route::resource('shop_categories', ShopCategories::class);
