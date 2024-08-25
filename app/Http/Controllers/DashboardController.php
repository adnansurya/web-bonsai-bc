<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $now = Carbon::now();
        $currentYear = $now->year;

        // Total penghasilan bulan ini
        $currentMonthSales = Sale::whereYear('date', $now->year)
                                 ->whereMonth('date', $now->month)
                                 ->sum('total_price');
    
        // Total penghasilan bulan lalu
        $previousMonthSales = Sale::whereYear('date', $now->year)
                                  ->whereMonth('date', $now->subMonth()->month)
                                  ->sum('total_price');
    
        // Persentase perubahan dari bulan sebelumnya
        if ($previousMonthSales == 0) {
            $percentageChange = $currentMonthSales == 0 ? 0 : 100;
        } else {
            $percentageChange = (($currentMonthSales - $previousMonthSales) / $previousMonthSales) * 100;
            
        }

        // Produk terlaris
        $topProducts = Sale::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('product_id')
        ->orderBy('total_quantity', 'desc')
        ->take(5)
        ->get();

        // Data pendapatan per bulan untuk tahun ini
        $monthlySales = [];
        $monthlyTransactions = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlySales[$month] = Sale::whereYear('date', $currentYear)
                                        ->whereMonth('date', $month)
                                        ->sum('total_price');
            $monthlyTransactions[$month] = Sale::whereYear('date', $currentYear)
                ->whereMonth('date', $month)
                ->count();
    }   



        return view('dashboard.dashboard', [
            'sales' => Sale::take(5)->latest('date')->get(),
            'currentMonthSales' => $currentMonthSales,
            'previousMonthSales' =>$previousMonthSales,
            'percentageChange' => ($percentageChange),
            'topProducts' => $topProducts,
            'monthlySales' => $monthlySales,
            'monthlyTransactions' => $monthlyTransactions,
        ]);
    }
}
