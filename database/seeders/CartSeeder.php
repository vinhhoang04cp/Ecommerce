<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy user IDs (sẽ sử dụng 10 users đầu tiên)
        $userIds = DB::table('users')->limit(10)->pluck('id')->toArray();

        $carts = [
            // Các user có giỏ hàng hiện tại
            [
                'user_id' => $userIds[0],
                'created_at' => Carbon::now()->subDays(3)
            ],
            [
                'user_id' => $userIds[1],
                'created_at' => Carbon::now()->subDays(2)
            ],
            [
                'user_id' => $userIds[2],
                'created_at' => Carbon::now()->subDays(5)
            ],
            [
                'user_id' => $userIds[3], // Admin
                'created_at' => Carbon::now()->subDays(1)
            ],
            [
                'user_id' => $userIds[4],
                'created_at' => Carbon::now()->subHours(6)
            ],
            [
                'user_id' => $userIds[5],
                'created_at' => Carbon::now()->subDays(4)
            ],
            [
                'user_id' => $userIds[6],
                'created_at' => Carbon::now()->subHours(12)
            ],
            [
                'user_id' => $userIds[7],
                'created_at' => Carbon::now()->subDays(1)
            ],
            [
                'user_id' => $userIds[8],
                'created_at' => Carbon::now()->subHours(2)
            ],
            [
                'user_id' => $userIds[9],
                'created_at' => Carbon::now()->subDays(6)
            ]
        ];

        DB::table('carts')->insert($carts);
    }
}
