<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class RevenueController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));

        // Doanh thu từng tháng
        $monthlyRevenue = Order::selectRaw('MONTH(order_date) as month, SUM(total) as revenue')
            ->whereYear('order_date', $year)
            ->where('status', '!=', 'Đã huỷ')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('revenue', 'month')
            ->toArray();

        // Tổng doanh thu
        $totalRevenue = array_sum($monthlyRevenue);

        // Tổng đơn hàng
        $totalOrders = Order::whereYear('order_date', $year)->count();

        // Khách hàng mới (distinct theo tên)
        $newCustomers = Order::whereYear('order_date', $year)->distinct('customer_name')->count('customer_name');

        // 5 đơn hàng mới nhất
        $orders = Order::whereYear('order_date', $year)
            ->orderByDesc('order_date')
            ->limit(5)
            ->get();

        // Dữ liệu cho biểu đồ (12 tháng)
        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlyRevenue[$i] ?? 0;
        }

        return view('revenue.index', compact(
            'year', 'chartData', 'totalRevenue', 'totalOrders', 'newCustomers', 'orders'
        ));
    }
}