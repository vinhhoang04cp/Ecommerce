<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy product IDs dựa trên tên
        $products = DB::table('products')
            ->select('product_id', 'name')
            ->get()
            ->keyBy('name');

        $inventories = [
            // iPhone 15 Pro Max
            [
                'product_id' => $products['iPhone 15 Pro Max']->product_id,
                'stock_in' => 100,
                'stock_out' => 50,
                'current_stock' => 50,
                'updated_at' => Carbon::now()
            ],
            // Samsung Galaxy S24 Ultra
            [
                'product_id' => $products['Samsung Galaxy S24 Ultra']->product_id,
                'stock_in' => 80,
                'stock_out' => 40,
                'current_stock' => 40,
                'updated_at' => Carbon::now()
            ],
            // MacBook Pro M3
            [
                'product_id' => $products['MacBook Pro M3']->product_id,
                'stock_in' => 50,
                'stock_out' => 25,
                'current_stock' => 25,
                'updated_at' => Carbon::now()
            ],
            // AirPods Pro 2
            [
                'product_id' => $products['AirPods Pro 2']->product_id,
                'stock_in' => 200,
                'stock_out' => 100,
                'current_stock' => 100,
                'updated_at' => Carbon::now()
            ],
            // Áo Thun Nam Basic
            [
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'stock_in' => 500,
                'stock_out' => 300,
                'current_stock' => 200,
                'updated_at' => Carbon::now()
            ],
            // Quần Jeans Nam Slim Fit
            [
                'product_id' => $products['Quần Jeans Nam Slim Fit']->product_id,
                'stock_in' => 300,
                'stock_out' => 150,
                'current_stock' => 150,
                'updated_at' => Carbon::now()
            ],
            // Váy Maxi Nữ
            [
                'product_id' => $products['Váy Maxi Nữ']->product_id,
                'stock_in' => 150,
                'stock_out' => 70,
                'current_stock' => 80,
                'updated_at' => Carbon::now()
            ],
            // Giày Sneaker Nike Air Force 1
            [
                'product_id' => $products['Giày Sneaker Nike Air Force 1']->product_id,
                'stock_in' => 120,
                'stock_out' => 60,
                'current_stock' => 60,
                'updated_at' => Carbon::now()
            ],
            // Sofa Góc L
            [
                'product_id' => $products['Sofa Góc L']->product_id,
                'stock_in' => 30,
                'stock_out' => 15,
                'current_stock' => 15,
                'updated_at' => Carbon::now()
            ],
            // Bàn Ăn 6 Người
            [
                'product_id' => $products['Bàn Ăn 6 Người']->product_id,
                'stock_in' => 40,
                'stock_out' => 20,
                'current_stock' => 20,
                'updated_at' => Carbon::now()
            ],
            // Cây Monstera
            [
                'product_id' => $products['Cây Monstera']->product_id,
                'stock_in' => 70,
                'stock_out' => 35,
                'current_stock' => 35,
                'updated_at' => Carbon::now()
            ],
            // Đắc Nhân Tâm
            [
                'product_id' => $products['Đắc Nhân Tâm']->product_id,
                'stock_in' => 500,
                'stock_out' => 200,
                'current_stock' => 300,
                'updated_at' => Carbon::now()
            ],
            // Atomic Habits
            [
                'product_id' => $products['Atomic Habits']->product_id,
                'stock_in' => 400,
                'stock_out' => 150,
                'current_stock' => 250,
                'updated_at' => Carbon::now()
            ],
            // Café Sáng Với Tony
            [
                'product_id' => $products['Café Sáng Với Tony']->product_id,
                'stock_in' => 300,
                'stock_out' => 120,
                'current_stock' => 180,
                'updated_at' => Carbon::now()
            ],
            // Xe Đạp Thể Thao Giant
            [
                'product_id' => $products['Xe Đạp Thể Thao Giant']->product_id,
                'stock_in' => 50,
                'stock_out' => 20,
                'current_stock' => 30,
                'updated_at' => Carbon::now()
            ],
            // Bóng Đá FIFA Quality
            [
                'product_id' => $products['Bóng Đá FIFA Quality']->product_id,
                'stock_in' => 200,
                'stock_out' => 100,
                'current_stock' => 100,
                'updated_at' => Carbon::now()
            ],
            // Bộ Câu Cá Shimano
            [
                'product_id' => $products['Bộ Câu Cá Shimano']->product_id,
                'stock_in' => 40,
                'stock_out' => 15,
                'current_stock' => 25,
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('inventories')->insert($inventories);
    }
}
