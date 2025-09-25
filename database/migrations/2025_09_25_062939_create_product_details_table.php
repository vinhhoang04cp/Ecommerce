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
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('detail_id');
            $table->unsignedBigInteger('product_id');
            $table->string('size', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('material', 100)->nullable();

            $table->index('product_id', 'idx_product_details_product_id');
            $table->unique(['product_id', 'size', 'color', 'material'], 'uniq_product_variant');

            $table->foreign('product_id')->references('product_id')->on('products')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
