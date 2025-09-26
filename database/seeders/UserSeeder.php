<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kiểm tra xem đã có user admin chưa
        $existingUserCount = DB::table('users')->count();
        if ($existingUserCount > 0) {
            $this->command->info('Users already exist, skipping UserSeeder.');
            return;
        }

        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@ecommerce.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 1, // Admin role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nguyễn Văn An',
                'email' => 'an.nguyen@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Trần Thị Bình',
                'email' => 'binh.tran@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Lê Hoàng Cường',
                'email' => 'cuong.le@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Phạm Thu Dung',
                'email' => 'dung.pham@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Hoàng Quang Em',
                'email' => 'em.hoang@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Võ Minh Phi',
                'email' => 'phi.vo@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Đặng Thái Giang',
                'email' => 'giang.dang@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bùi Ngọc Hạnh',
                'email' => 'hanh.bui@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Ngô Thu Ý',
                'email' => 'y.ngo@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // User role
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('users')->insert($users);
    }
}
