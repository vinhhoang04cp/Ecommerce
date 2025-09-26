<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy user IDs (sẽ sử dụng 10 users đầu tiên)
        $userIds = DB::table('users')->limit(10)->pluck('id')->toArray();

        $orders = [
            // Đơn hàng của User đầu tiên
            [
                'user_id' => $userIds[0],
                'order_date' => Carbon::now()->subDays(5),
                'status' => 'completed',
                'total_amount' => 30079000
            ],
            [
                'user_id' => $userIds[0],
                'order_date' => Carbon::now()->subDays(2),
                'status' => 'shipped',
                'total_amount' => 1389000
            ],
            
            // Đơn hàng của User thứ hai
            [
                'user_id' => $userIds[1],
                'order_date' => Carbon::now()->subDays(7),
                'status' => 'completed',
                'total_amount' => 54990000
            ],
            [
                'user_id' => $userIds[1],
                'order_date' => Carbon::now()->subDays(1),
                'status' => 'paid',
                'total_amount' => 8990000
            ],
            
            // Đơn hàng của User thứ ba
            [
                'user_id' => $userIds[2],
                'order_date' => Carbon::now()->subDays(10),
                'status' => 'completed',
                'total_amount' => 6579000
            ],
            [
                'user_id' => $userIds[2],
                'order_date' => Carbon::now()->subDays(3),
                'status' => 'shipped',
                'total_amount' => 2990000
            ],
            
            // Đơn hàng của User thứ tư (Admin)
            [
                'user_id' => $userIds[3],
                'order_date' => Carbon::now()->subDays(6),
                'status' => 'completed',
                'total_amount' => 15900000
            ],
            
            // Đơn hàng của User thứ năm
            [
                'user_id' => $userIds[4],
                'order_date' => Carbon::now()->subDays(8),
                'status' => 'completed',
                'total_amount' => 297000
            ],
            [
                'user_id' => $userIds[4],
                'order_date' => Carbon::now()->subHours(6),
                'status' => 'pending',
                'total_amount' => 12900000
            ],
            
            // Đơn hàng của User thứ sáu
            [
                'user_id' => $userIds[5],
                'order_date' => Carbon::now()->subDays(4),
                'status' => 'completed',
                'total_amount' => 4679000
            ],
            [
                'user_id' => $userIds[5],
                'order_date' => Carbon::now()->subHours(12),
                'status' => 'pending',
                'total_amount' => 890000
            ],
            
            // Đơn hàng của User thứ bảy
            [
                'user_id' => $userIds[6],
                'order_date' => Carbon::now()->subDays(9),
                'status' => 'completed',
                'total_amount' => 1388000
            ],
            [
                'user_id' => $userIds[6],
                'order_date' => Carbon::now()->subDays(1),
                'status' => 'shipped',
                'total_amount' => 31990000
            ],
            
            // Đơn hàng của User thứ tám
            [
                'user_id' => $userIds[7],
                'order_date' => Carbon::now()->subDays(11),
                'status' => 'completed',
                'total_amount' => 8900000
            ],
            [
                'user_id' => $userIds[7],
                'order_date' => Carbon::now()->subHours(2),
                'status' => 'pending',
                'total_amount' => 208000
            ],
            
            // Đơn hàng của User thứ chín
            [
                'user_id' => $userIds[8],
                'order_date' => Carbon::now()->subDays(12),
                'status' => 'completed',
                'total_amount' => 6490000
            ],
            
            // Đơn hàng của User thứ mười
            [
                'user_id' => $userIds[9],
                'order_date' => Carbon::now()->subDays(13),
                'status' => 'completed',
                'total_amount' => 1779000
            ],
            [
                'user_id' => $userIds[9],
                'order_date' => Carbon::now()->subDays(2),
                'status' => 'shipped',
                'total_amount' => 890000
            ],
            
            // Một số đơn hàng bị hủy
            [
                'user_id' => $userIds[1],
                'order_date' => Carbon::now()->subDays(14),
                'status' => 'cancelled',
                'total_amount' => 0
            ],
            [
                'user_id' => $userIds[4],
                'order_date' => Carbon::now()->subDays(15),
                'status' => 'cancelled',
                'total_amount' => 0
            ]
        ];

        DB::table('orders')->insert($orders);
    }
}
