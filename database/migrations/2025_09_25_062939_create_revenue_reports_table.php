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
        Schema::create('revenue_reports', function (Blueprint $table) {
            $table->bigIncrements('report_id');
            $table->date('date');
            $table->unsignedInteger('total_orders')->default(0);
            $table->decimal('total_revenue', 14, 2)->default(0.00);
            $table->decimal('total_profit', 14, 2)->default(0.00);

            $table->unique('date', 'uniq_revenue_reports_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenue_reports');
    }
};
