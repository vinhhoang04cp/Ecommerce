<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDetailSeeder extends Seeder
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

        $productDetails = [
            // iPhone 15 Pro Max
            [
                'product_id' => $products['iPhone 15 Pro Max']->product_id,
                'size' => '6.7 inch',
                'color' => 'Titanium Đen',
                'material' => 'Titanium'
            ],
            [
                'product_id' => $products['iPhone 15 Pro Max']->product_id,
                'size' => '6.7 inch',
                'color' => 'Titanium Trắng',
                'material' => 'Titanium'
            ],
            [
                'product_id' => $products['iPhone 15 Pro Max']->product_id,
                'size' => '6.7 inch',
                'color' => 'Titanium Xanh',
                'material' => 'Titanium'
            ],
            
            // Samsung Galaxy S24 Ultra
            [
                'product_id' => $products['Samsung Galaxy S24 Ultra']->product_id,
                'size' => '6.8 inch',
                'color' => 'Đen Phantom',
                'material' => 'Aluminum'
            ],
            [
                'product_id' => $products['Samsung Galaxy S24 Ultra']->product_id,
                'size' => '6.8 inch',
                'color' => 'Tím',
                'material' => 'Aluminum'
            ],
            
            // MacBook Pro M3
            [
                'product_id' => $products['MacBook Pro M3']->product_id,
                'size' => '14 inch',
                'color' => 'Space Gray',
                'material' => 'Aluminum'
            ],
            [
                'product_id' => $products['MacBook Pro M3']->product_id,
                'size' => '14 inch',
                'color' => 'Silver',
                'material' => 'Aluminum'
            ],
            
            // AirPods Pro 2
            [
                'product_id' => $products['AirPods Pro 2']->product_id,
                'size' => 'One Size',
                'color' => 'Trắng',
                'material' => 'Plastic'
            ],
            
            // Áo Thun Nam Basic
            [
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'size' => 'S',
                'color' => 'Trắng',
                'material' => 'Cotton 100%'
            ],
            [
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'size' => 'M',
                'color' => 'Trắng',
                'material' => 'Cotton 100%'
            ],
            [
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'size' => 'L',
                'color' => 'Trắng',
                'material' => 'Cotton 100%'
            ],
            [
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'size' => 'XL',
                'color' => 'Trắng',
                'material' => 'Cotton 100%'
            ],
            [
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'size' => 'M',
                'color' => 'Đen',
                'material' => 'Cotton 100%'
            ],
            [
                'product_id' => $products['Áo Thun Nam Basic']->product_id,
                'size' => 'L',
                'color' => 'Đen',
                'material' => 'Cotton 100%'
            ],
            
            // Quần Jeans Nam Slim Fit
            [
                'product_id' => $products['Quần Jeans Nam Slim Fit']->product_id,
                'size' => '29',
                'color' => 'Xanh Đậm',
                'material' => 'Denim'
            ],
            [
                'product_id' => $products['Quần Jeans Nam Slim Fit']->product_id,
                'size' => '30',
                'color' => 'Xanh Đậm',
                'material' => 'Denim'
            ],
            [
                'product_id' => $products['Quần Jeans Nam Slim Fit']->product_id,
                'size' => '31',
                'color' => 'Xanh Đậm',
                'material' => 'Denim'
            ],
            [
                'product_id' => $products['Quần Jeans Nam Slim Fit']->product_id,
                'size' => '32',
                'color' => 'Xanh Đậm',
                'material' => 'Denim'
            ],
            [
                'product_id' => $products['Quần Jeans Nam Slim Fit']->product_id,
                'size' => '30',
                'color' => 'Đen',
                'material' => 'Denim'
            ],
            [
                'product_id' => $products['Quần Jeans Nam Slim Fit']->product_id,
                'size' => '31',
                'color' => 'Đen',
                'material' => 'Denim'
            ],
            
            // Váy Maxi Nữ
            [
                'product_id' => $products['Váy Maxi Nữ']->product_id,
                'size' => 'S',
                'color' => 'Hồng',
                'material' => 'Voan'
            ],
            [
                'product_id' => $products['Váy Maxi Nữ']->product_id,
                'size' => 'M',
                'color' => 'Hồng',
                'material' => 'Voan'
            ],
            [
                'product_id' => $products['Váy Maxi Nữ']->product_id,
                'size' => 'L',
                'color' => 'Hồng',
                'material' => 'Voan'
            ],
            [
                'product_id' => $products['Váy Maxi Nữ']->product_id,
                'size' => 'M',
                'color' => 'Xanh Navy',
                'material' => 'Voan'
            ],
            
            // Giày Sneaker Nike Air Force 1
            [
                'product_id' => $products['Giày Sneaker Nike Air Force 1']->product_id,
                'size' => '38',
                'color' => 'Trắng',
                'material' => 'Da'
            ],
            [
                'product_id' => $products['Giày Sneaker Nike Air Force 1']->product_id,
                'size' => '39',
                'color' => 'Trắng',
                'material' => 'Da'
            ],
            [
                'product_id' => $products['Giày Sneaker Nike Air Force 1']->product_id,
                'size' => '40',
                'color' => 'Trắng',
                'material' => 'Da'
            ],
            [
                'product_id' => $products['Giày Sneaker Nike Air Force 1']->product_id,
                'size' => '41',
                'color' => 'Trắng',
                'material' => 'Da'
            ],
            [
                'product_id' => $products['Giày Sneaker Nike Air Force 1']->product_id,
                'size' => '42',
                'color' => 'Trắng',
                'material' => 'Da'
            ],
            
            // Sofa Góc L
            [
                'product_id' => $products['Sofa Góc L']->product_id,
                'size' => 'L250cm x W160cm',
                'color' => 'Xám',
                'material' => 'Vải bọc'
            ],
            [
                'product_id' => $products['Sofa Góc L']->product_id,
                'size' => 'L250cm x W160cm',
                'color' => 'Be',
                'material' => 'Vải bọc'
            ],
            
            // Bàn Ăn 6 Người
            [
                'product_id' => $products['Bàn Ăn 6 Người']->product_id,
                'size' => 'L180cm x W90cm',
                'color' => 'Nâu Sồi',
                'material' => 'Gỗ Sồi'
            ],
            
            // Cây Monstera
            [
                'product_id' => $products['Cây Monstera']->product_id,
                'size' => 'H60cm',
                'color' => 'Xanh Lá',
                'material' => 'Cây sống'
            ],
            
            // Xe Đạp Thể Thao Giant
            [
                'product_id' => $products['Xe Đạp Thể Thao Giant']->product_id,
                'size' => '26 inch',
                'color' => 'Đen',
                'material' => 'Aluminum'
            ],
            [
                'product_id' => $products['Xe Đạp Thể Thao Giant']->product_id,
                'size' => '26 inch',
                'color' => 'Xanh',
                'material' => 'Aluminum'
            ],
            
            // Bóng Đá FIFA Quality
            [
                'product_id' => $products['Bóng Đá FIFA Quality']->product_id,
                'size' => 'Size 5',
                'color' => 'Trắng/Đen',
                'material' => 'Da PU'
            ],
            
            // Bộ Câu Cá Shimano
            [
                'product_id' => $products['Bộ Câu Cá Shimano']->product_id,
                'size' => '2.7m',
                'color' => 'Đen/Vàng',
                'material' => 'Carbon Fiber'
            ]
        ];

        DB::table('product_details')->insert($productDetails);
    }
}
