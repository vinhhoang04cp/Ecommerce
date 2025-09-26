<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed trong thứ tự đúng dependency
        
        // 0. Seed Voyager data (roles, permissions, etc.)
        $this->call(VoyagerDatabaseSeeder::class);
        
        // 1. Seed Users trước (để có foreign key reference)
        $this->call(UserSeeder::class);

        // 2. Seed Shop Categories
        $this->call(ShopCategorySeeder::class);
        
        // 3. Seed Products (cần category_id)
        $this->call(ProductSeeder::class);
        
        // 4. Seed Product Details (cần product_id)
        $this->call(ProductDetailSeeder::class);
        
        // 5. Seed Inventories (cần product_id)
        $this->call(InventorySeeder::class);
        
        // 6. Seed Carts (cần user_id)
        $this->call(CartSeeder::class);
        
        // 7. Seed Cart Items (cần cart_id và product_id)
        $this->call(CartItemSeeder::class);
        
        // 8. Seed Orders (cần user_id)
        $this->call(OrderSeeder::class);
        
        // 9. Seed Order Items (cần order_id và product_id)
        $this->call(OrderItemSeeder::class);
        
        // 10. Seed Revenue Reports (độc lập)
        $this->call(RevenueReportSeeder::class);
    }
}
