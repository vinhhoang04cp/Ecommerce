<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy cart IDs và product IDs
        $cartIds = DB::table('carts')->orderBy('cart_id')->limit(10)->pluck('cart_id')->toArray();
        $products = DB::table('products')
            ->select('product_id', 'name')
            ->get()
            ->keyBy('name');

        $cartItems = [
            // Cart của User đầu tiên
            [
                'cart_id' => $cartIds[0],
                'product_id' => $products['Samsung Galaxy S24 Ultra']->product_id,
                'quantity' => 1
            ],
            [
                'cart_id' => $cartIds[0],
                'product_id' => $products['Giày Sneaker Nike Air Force 1']->product_id,
                'quantity' => 1
            ],
            
            // Cart của User thứ hai
            [
                'cart_id' => $cartIds[1],
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'quantity' => 2
            ],
            [
                'cart_id' => $cartIds[1],
                'product_id' => $products['Quần Jeans Nam Slim Fit']->product_id,
                'quantity' => 1
            ],
            [
                'cart_id' => $cartIds[1],
                'product_id' => $products['Đắc Nhân Tâm']->product_id,
                'quantity' => 1
            ],
            
            // Cart của User thứ ba
            [
                'cart_id' => $cartIds[2],
                'product_id' => $products['Xe Đạp Thể Thao Giant']->product_id,
                'quantity' => 1
            ],
            [
                'cart_id' => $cartIds[2],
                'product_id' => $products['Bóng Đá FIFA Quality']->product_id,
                'quantity' => 2
            ],
            
            // Cart của Admin
            [
                'cart_id' => $cartIds[3],
                'product_id' => $products['iPhone 15 Pro Max']->product_id,
                'quantity' => 1
            ],
            [
                'cart_id' => $cartIds[3],
                'product_id' => $products['MacBook Pro M3']->product_id,
                'quantity' => 1
            ],
            
            // Cart của User thứ năm
            [
                'cart_id' => $cartIds[4],
                'product_id' => $products['Váy Maxi Nữ']->product_id,
                'quantity' => 1
            ],
            [
                'cart_id' => $cartIds[4],
                'product_id' => $products['Cây Monstera']->product_id,
                'quantity' => 2
            ],
            
            // Cart của User thứ sáu
            [
                'cart_id' => $cartIds[5],
                'product_id' => $products['Sofa Góc L']->product_id,
                'quantity' => 1
            ],
            
            // Cart của User thứ bảy
            [
                'cart_id' => $cartIds[6],
                'product_id' => $products['AirPods Pro 2']->product_id,
                'quantity' => 2
            ],
            [
                'cart_id' => $cartIds[6],
                'product_id' => $products['Atomic Habits']->product_id,
                'quantity' => 1
            ],
            [
                'cart_id' => $cartIds[6],
                'product_id' => $products['Café Sáng Với Tony']->product_id,
                'quantity' => 1
            ],
            
            // Cart của User thứ tám
            [
                'cart_id' => $cartIds[7],
                'product_id' => $products['Bàn Ăn 6 Người']->product_id,
                'quantity' => 1
            ],
            [
                'cart_id' => $cartIds[7],
                'product_id' => $products['Cây Monstera']->product_id,
                'quantity' => 1
            ],
            
            // Cart của User thứ chín
            [
                'cart_id' => $cartIds[8],
                'product_id' => $products['Bộ Câu Cá Shimano']->product_id,
                'quantity' => 1
            ],
            [
                'cart_id' => $cartIds[8],
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'quantity' => 3
            ],
            
            // Cart của User thứ mười - giỏ hàng đơn giản
            [
                'cart_id' => $cartIds[9],
                'product_id' => $products['Đắc Nhân Tâm']->product_id,
                'quantity' => 1
            ]
        ];

        DB::table('cart_items')->insert($cartItems);
    }
}
