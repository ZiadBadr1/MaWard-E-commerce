<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {

        // Data for charts
        $ordersByMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')->toArray();

        $revenueByMonth = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as sum')
            ->groupBy('month')
            ->pluck('sum', 'month')->toArray();

        return view('admin.dashboard', [
            'totalOrders' => Order::count(),
            'totalUsers' => User::count(),
            'totalProducts' => Product::count(),
            'pendingOrders' => Order::where('status', 'pending')->count(),
            'shippedOrders' => Order::where('status', 'shipped')->count(),
            'deliveredOrders' => Order::where('status', 'delivered')->count(),
            'netProfit' => Order::sum('total_amount'),
            'latestOrders' => Order::latest()->take(5)->get(),
            'ordersByMonth' => $ordersByMonth,
            'revenueByMonth' => $revenueByMonth,
        ]);
    }
}
