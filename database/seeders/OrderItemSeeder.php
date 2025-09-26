<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy order IDs và product IDs
        $orderIds = DB::table('orders')->orderBy('order_id')->limit(18)->pluck('order_id')->toArray();
        $products = DB::table('products')
            ->select('product_id', 'name', 'price')
            ->get()
            ->keyBy('name');

        $orderItems = [
            // Order đầu tiên: iPhone + AirPods
            [
                'order_id' => $orderIds[0],
                'product_id' => $products['iPhone 15 Pro Max']->product_id,
                'quantity' => 1,
                'price' => $products['iPhone 15 Pro Max']->price
            ],
            [
                'order_id' => $orderIds[0],
                'product_id' => $products['AirPods Pro 2']->product_id,
                'quantity' => 1,
                'price' => $products['AirPods Pro 2']->price
            ],
            
            // Order thứ hai: Váy + Cây
            [
                'order_id' => $orderIds[1],
                'product_id' => $products['Váy Maxi Nữ']->product_id,
                'quantity' => 1,
                'price' => $products['Váy Maxi Nữ']->price
            ],
            [
                'order_id' => $orderIds[1],
                'product_id' => $products['Cây Monstera']->product_id,
                'quantity' => 1,
                'price' => $products['Cây Monstera']->price
            ],
            
            // Order thứ ba: MacBook
            [
                'order_id' => $orderIds[2],
                'product_id' => $products['MacBook Pro M3']->product_id,
                'quantity' => 1,
                'price' => $products['MacBook Pro M3']->price
            ],
            
            // Order thứ tư: Bàn Ăn
            [
                'order_id' => $orderIds[3],
                'product_id' => $products['Bàn Ăn 6 Người']->product_id,
                'quantity' => 1,
                'price' => $products['Bàn Ăn 6 Người']->price
            ],
            
            // Order thứ năm: AirPods + Sách
            [
                'order_id' => $orderIds[4],
                'product_id' => $products['AirPods Pro 2']->product_id,
                'quantity' => 1,
                'price' => $products['AirPods Pro 2']->price
            ],
            [
                'order_id' => $orderIds[4],
                'product_id' => $products['Đắc Nhân Tâm']->product_id,
                'quantity' => 1,
                'price' => $products['Đắc Nhân Tâm']->price
            ],
            
            // Order thứ sáu: Nike Shoes
            [
                'order_id' => $orderIds[5],
                'product_id' => $products['Giày Sneaker Nike Air Force 1']->product_id,
                'quantity' => 1,
                'price' => $products['Giày Sneaker Nike Air Force 1']->price
            ],
            
            // Order thứ bảy (Admin): Sofa
            [
                'order_id' => $orderIds[6],
                'product_id' => $products['Sofa Góc L']->product_id,
                'quantity' => 1,
                'price' => $products['Sofa Góc L']->price
            ],
            
            // Order thứ tám: Sách
            [
                'order_id' => $orderIds[7],
                'product_id' => $products['Đắc Nhân Tâm']->product_id,
                'quantity' => 1,
                'price' => $products['Đắc Nhân Tâm']->price
            ],
            [
                'order_id' => $orderIds[7],
                'product_id' => $products['Atomic Habits']->product_id,
                'quantity' => 1,
                'price' => $products['Atomic Habits']->price
            ],
            [
                'order_id' => $orderIds[7],
                'product_id' => $products['Café Sáng Với Tony']->product_id,
                'quantity' => 1,
                'price' => $products['Café Sáng Với Tony']->price
            ],
            
            // Order thứ chín: Xe Đạp
            [
                'order_id' => $orderIds[8],
                'product_id' => $products['Xe Đạp Thể Thao Giant']->product_id,
                'quantity' => 1,
                'price' => $products['Xe Đạp Thể Thao Giant']->price
            ],
            
            // Order thứ mười: Bộ Câu + Bóng Đá
            [
                'order_id' => $orderIds[9],
                'product_id' => $products['Bộ Câu Cá Shimano']->product_id,
                'quantity' => 1,
                'price' => $products['Bộ Câu Cá Shimano']->price
            ],
            [
                'order_id' => $orderIds[9],
                'product_id' => $products['Bóng Đá FIFA Quality']->product_id,
                'quantity' => 1,
                'price' => $products['Bóng Đá FIFA Quality']->price
            ],
        ];

        DB::table('order_items')->insert($orderItems);
    }
}
