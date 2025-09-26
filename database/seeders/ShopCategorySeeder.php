<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ShopCategory;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if categories already exist to avoid duplicates
        if (ShopCategory::count() > 0) {
            $this->command->info('Shop categories already exist, skipping seeding.');
            return;
        }

        // Sample categories for an e-commerce store
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and gadgets including smartphones, laptops, and accessories'
            ],
            [
                'name' => 'Fashion',
                'description' => 'Clothing, footwear, and accessories for men, women, and children'
            ],
            [
                'name' => 'Home & Kitchen',
                'description' => 'Home appliances, kitchenware, furniture, and home décor items'
            ],
            [
                'name' => 'Books',
                'description' => 'Books across various genres including fiction, non-fiction, academic, and children\'s books'
            ],
            [
                'name' => 'Sports & Outdoors',
                'description' => 'Sporting goods, fitness equipment, and outdoor recreation products'
            ],
            [
                'name' => 'Beauty & Personal Care',
                'description' => 'Cosmetics, skincare, haircare, and personal hygiene products'
            ],
            [
                'name' => 'Toys & Games',
                'description' => 'Toys, games, and entertainment products for all ages'
            ],
            [
                'name' => 'Health & Wellness',
                'description' => 'Health supplements, medical supplies, and wellness products'
            ]
        ];

        // Insert categories into the database
        foreach ($categories as $category) {
            ShopCategory::create($category);
        }

        $this->command->info('Shop categories seeded successfully!');
    }
}
