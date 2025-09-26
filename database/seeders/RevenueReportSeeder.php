<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RevenueReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $revenueReports = [
            // Báo cáo doanh thu 30 ngày gần đây
            [
                'date' => Carbon::now()->subDays(30)->format('Y-m-d'),
                'total_orders' => 2,
                'total_revenue' => 15200000,
                'total_profit' => 3800000
            ],
            [
                'date' => Carbon::now()->subDays(29)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 6490000,
                'total_profit' => 1620000
            ],
            [
                'date' => Carbon::now()->subDays(28)->format('Y-m-d'),
                'total_orders' => 3,
                'total_revenue' => 42800000,
                'total_profit' => 10700000
            ],
            [
                'date' => Carbon::now()->subDays(27)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 2990000,
                'total_profit' => 750000
            ],
            [
                'date' => Carbon::now()->subDays(26)->format('Y-m-d'),
                'total_orders' => 2,
                'total_revenue' => 9780000,
                'total_profit' => 2450000
            ],
            [
                'date' => Carbon::now()->subDays(25)->format('Y-m-d'),
                'total_orders' => 4,
                'total_revenue' => 18900000,
                'total_profit' => 4720000
            ],
            [
                'date' => Carbon::now()->subDays(24)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 54990000,
                'total_profit' => 13750000
            ],
            [
                'date' => Carbon::now()->subDays(23)->format('Y-m-d'),
                'total_orders' => 2,
                'total_revenue' => 7380000,
                'total_profit' => 1840000
            ],
            [
                'date' => Carbon::now()->subDays(22)->format('Y-m-d'),
                'total_orders' => 3,
                'total_revenue' => 25680000,
                'total_profit' => 6420000
            ],
            [
                'date' => Carbon::now()->subDays(21)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 12900000,
                'total_profit' => 3220000
            ],
            [
                'date' => Carbon::now()->subDays(20)->format('Y-m-d'),
                'total_orders' => 2,
                'total_revenue' => 16790000,
                'total_profit' => 4200000
            ],
            [
                'date' => Carbon::now()->subDays(19)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 8900000,
                'total_profit' => 2220000
            ],
            [
                'date' => Carbon::now()->subDays(18)->format('Y-m-d'),
                'total_orders' => 3,
                'total_revenue' => 11570000,
                'total_profit' => 2890000
            ],
            [
                'date' => Carbon::now()->subDays(17)->format('Y-m-d'),
                'total_orders' => 2,
                'total_revenue' => 33280000,
                'total_profit' => 8320000
            ],
            [
                'date' => Carbon::now()->subDays(16)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 1780000,
                'total_profit' => 445000
            ],
            [
                'date' => Carbon::now()->subDays(15)->format('Y-m-d'),
                'total_orders' => 2,
                'total_revenue' => 24790000,
                'total_profit' => 6200000
            ],
            [
                'date' => Carbon::now()->subDays(14)->format('Y-m-d'),
                'total_orders' => 3,
                'total_revenue' => 15890000,
                'total_profit' => 3970000
            ],
            [
                'date' => Carbon::now()->subDays(13)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 1779000,
                'total_profit' => 445000
            ],
            [
                'date' => Carbon::now()->subDays(12)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 6490000,
                'total_profit' => 1620000
            ],
            [
                'date' => Carbon::now()->subDays(11)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 8900000,
                'total_profit' => 2220000
            ],
            [
                'date' => Carbon::now()->subDays(10)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 6579000,
                'total_profit' => 1645000
            ],
            [
                'date' => Carbon::now()->subDays(9)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 1388000,
                'total_profit' => 347000
            ],
            [
                'date' => Carbon::now()->subDays(8)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 297000,
                'total_profit' => 74000
            ],
            [
                'date' => Carbon::now()->subDays(7)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 54990000,
                'total_profit' => 13750000
            ],
            [
                'date' => Carbon::now()->subDays(6)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 15900000,
                'total_profit' => 3970000
            ],
            [
                'date' => Carbon::now()->subDays(5)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 30079000,
                'total_profit' => 7520000
            ],
            [
                'date' => Carbon::now()->subDays(4)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 4679000,
                'total_profit' => 1170000
            ],
            [
                'date' => Carbon::now()->subDays(3)->format('Y-m-d'),
                'total_orders' => 1,
                'total_revenue' => 2990000,
                'total_profit' => 748000
            ],
            [
                'date' => Carbon::now()->subDays(2)->format('Y-m-d'),
                'total_orders' => 2,
                'total_revenue' => 2279000,
                'total_profit' => 570000
            ],
            [
                'date' => Carbon::now()->subDays(1)->format('Y-m-d'),
                'total_orders' => 2,
                'total_revenue' => 40980000,
                'total_profit' => 10245000
            ],
            [
                'date' => Carbon::now()->format('Y-m-d'),
                'total_orders' => 0,
                'total_revenue' => 0,
                'total_profit' => 0
            ]
        ];

        DB::table('revenue_reports')->insert($revenueReports);
    }
}
