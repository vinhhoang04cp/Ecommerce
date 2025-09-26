<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Electronics
            [
                'name' => 'iPhone 15 Pro Max',
                'description' => 'Apple iPhone 15 Pro Max 256GB với chip A17 Pro, camera 48MP và titanium design.',
                'price' => 29990000,
                'category_id' => 1, // Electronics
                'stock_quantity' => 50,
                'image_url' => 'https://example.com/images/iphone-15-pro-max.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Samsung Galaxy S24 Ultra 512GB với S Pen, camera 200MP và màn hình Dynamic AMOLED.',
                'price' => 31990000,
                'category_id' => 1, // Electronics
                'stock_quantity' => 40,
                'image_url' => 'https://example.com/images/samsung-s24-ultra.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'MacBook Pro M3',
                'description' => 'MacBook Pro 14 inch với chip M3, 16GB RAM, 512GB SSD.',
                'price' => 54990000,
                'category_id' => 1, // Electronics
                'stock_quantity' => 25,
                'image_url' => 'https://example.com/images/macbook-pro-m3.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'AirPods Pro 2',
                'description' => 'Apple AirPods Pro thế hệ 2 với chip H2, Active Noise Cancellation.',
                'price' => 6490000,
                'category_id' => 1, // Electronics
                'stock_quantity' => 100,
                'image_url' => 'https://example.com/images/airpods-pro-2.jpg',
                'created_at' => Carbon::now()
            ],
            
            // Fashion
            [
                'name' => 'Áo Thun Nam Basic',
                'description' => 'Áo thun nam cotton 100%, form regular, màu trắng basic.',
                'price' => 199000,
                'category_id' => 2, // Fashion
                'stock_quantity' => 200,
                'image_url' => 'https://example.com/images/ao-thun-nam.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Quần Jeans Nam Slim Fit',
                'description' => 'Quần jeans nam form slim fit, chất liệu denim cao cấp.',
                'price' => 899000,
                'category_id' => 2, // Fashion
                'stock_quantity' => 150,
                'image_url' => 'https://example.com/images/quan-jeans-nam.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Váy Maxi Nữ',
                'description' => 'Váy maxi nữ chất liệu voan mềm mại, thiết kế thanh lịch.',
                'price' => 1290000,
                'category_id' => 2, // Fashion
                'stock_quantity' => 80,
                'image_url' => 'https://example.com/images/vay-maxi-nu.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Giày Sneaker Nike Air Force 1',
                'description' => 'Giày sneaker Nike Air Force 1 trắng classic, chất liệu da thật.',
                'price' => 2990000,
                'category_id' => 2, // Fashion
                'stock_quantity' => 60,
                'image_url' => 'https://example.com/images/nike-air-force-1.jpg',
                'created_at' => Carbon::now()
            ],
            
            // Home & Kitchen
            [
                'name' => 'Sofa Góc L',
                'description' => 'Sofa góc L 3 chỗ ngồi, chất liệu vải bọc cao cấp, màu xám.',
                'price' => 15900000,
                'category_id' => 3, // Home & Kitchen
                'stock_quantity' => 15,
                'image_url' => 'https://example.com/images/sofa-goc-l.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bàn Ăn 6 Người',
                'description' => 'Bàn ăn gỗ sồi tự nhiên cho 6 người, thiết kế hiện đại.',
                'price' => 8900000,
                'category_id' => 3, // Home & Kitchen
                'stock_quantity' => 20,
                'image_url' => 'https://example.com/images/ban-an-6-nguoi.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Cây Monstera',
                'description' => 'Cây Monstera lá tím, chậu gốm sứ, phù hợp trang trí phòng khách.',
                'price' => 890000,
                'category_id' => 3, // Home & Kitchen
                'stock_quantity' => 35,
                'image_url' => 'https://example.com/images/cay-monstera.jpg',
                'created_at' => Carbon::now()
            ],
            
            // Books
            [
                'name' => 'Đắc Nhân Tâm',
                'description' => 'Sách "Đắc Nhân Tâm" của Dale Carnegie - Nghệ thuật giao tiếp và ứng xử.',
                'price' => 89000,
                'category_id' => 4, // Books
                'stock_quantity' => 300,
                'image_url' => 'https://example.com/images/dac-nhan-tam.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Atomic Habits',
                'description' => 'Sách "Atomic Habits" của James Clear về việc xây dựng thói quen tốt.',
                'price' => 129000,
                'category_id' => 4, // Books
                'stock_quantity' => 250,
                'image_url' => 'https://example.com/images/atomic-habits.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Café Sáng Với Tony',
                'description' => 'Tập hợp những bài viết truyền cảm hứng của Tony Buổi Sáng.',
                'price' => 79000,
                'category_id' => 4, // Books
                'stock_quantity' => 180,
                'image_url' => 'https://example.com/images/cafe-sang-voi-tony.jpg',
                'created_at' => Carbon::now()
            ],
            
            // Sports & Outdoors
            [
                'name' => 'Xe Đạp Thể Thao Giant',
                'description' => 'Xe đạp thể thao Giant 21 tốc độ, khung nhôm nhẹ.',
                'price' => 12900000,
                'category_id' => 5, // Sports & Outdoors
                'stock_quantity' => 30,
                'image_url' => 'https://example.com/images/xe-dap-giant.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bóng Đá FIFA Quality',
                'description' => 'Bóng đá FIFA Quality Pro, chất liệu da PU cao cấp.',
                'price' => 890000,
                'category_id' => 5, // Sports & Outdoors
                'stock_quantity' => 100,
                'image_url' => 'https://example.com/images/bong-da-fifa.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bộ Câu Cá Shimano',
                'description' => 'Bộ câu cá Shimano cao cấp gồm cần câu, máy câu và phụ kiện.',
                'price' => 4590000,
                'category_id' => 5, // Sports & Outdoors
                'stock_quantity' => 25,
                'image_url' => 'https://example.com/images/bo-cau-ca-shimano.jpg',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('products')->insert($products);
    }
}
