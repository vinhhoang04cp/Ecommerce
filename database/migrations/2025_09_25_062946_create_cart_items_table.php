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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('cart_item_id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity')->default(1);

            $table->index('cart_id', 'idx_cart_items_cart_id');
            $table->index('product_id', 'idx_cart_items_product_id');
            $table->unique(['cart_id', 'product_id'], 'uniq_cart_product');

            $table->foreign('cart_id')->references('cart_id')->on('carts')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
