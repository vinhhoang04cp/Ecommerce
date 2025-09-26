<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class RevenueReport extends Model
{
    protected $table = 'revenue_reports';

    protected $primaryKey = 'report_id';

    protected $fillable = [
        'date',
        'total_revenue',
        'total_orders',
        'total_products_sold',
    ];

    protected $casts = [
        'date' => 'date',
        'total_revenue' => 'decimal:2',
        'total_orders' => 'integer',
        'total_products_sold' => 'integer',
    ];

    /**
     * Revenue Reports: bảng báo cáo ngày, độc lập
     * UNIQUE(date) đảm bảo chỉ có 1 báo cáo cho mỗi ngày (định nghĩa ở migration)
     * Không có Foreign Key - bảng độc lập để báo cáo
     */

    /**
     * Scope để lấy báo cáo theo khoảng thời gian
     */
    public function scopeBetweenDates($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    /**
     * Scope để lấy báo cáo của tháng
     */
    public function scopeForMonth($query, $year, $month)
    {
        return $query->whereYear('date', $year)
            ->whereMonth('date', $month);
    }

    /**
     * Scope để lấy báo cáo của năm
     */
    public function scopeForYear($query, $year)
    {
        return $query->whereYear('date', $year);
    }
}
