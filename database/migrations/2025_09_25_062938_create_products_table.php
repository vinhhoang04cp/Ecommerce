<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->unsignedBigInteger('category_id');
            $table->unsignedInteger('stock_quantity')->default(0);
            $table->string('image_url', 2048)->nullable();
            $table->dateTime('created_at')->useCurrent();

            $table->index('category_id', 'idx_products_category_id');
            $table->index('name', 'idx_products_name');
            $table->foreign('category_id')->references('category_id')->on('shop_categories')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
