<?php

namespace App\Http\Controllers;

use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function getSalesByPeriod(Request $request)
    {
        $period = $request->input('period'); // 'day', 'month', 'year'
        $date = now();

        if ($period == 'month') {
            $date->startOfMonth();
        } elseif ($period == 'year') {
            $date->startOfYear();
        } // else default to 'day'

        $sales = OrderList::select('categories.name as category', 'products.name as product', 'order_lists.count as soldCount', 'products.price as price', 'order_lists.total as total')
            ->join('products', 'order_lists.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_lists.order_id', '=', 'orders.id')
            ->whereDate('orders.date', '>=', $date->toDateString())
            ->get();

        return response()->json($sales);
    }

    public function getSalesByPeriodAndProduct(Request $request, $productId)
    {
        $period = $request->input('period'); // 'day', 'month', 'year'
        $date = now();

        if ($period == 'month') {
            $date->startOfMonth();
        } elseif ($period == 'year') {
            $date->startOfYear();
        } // else default to 'day'

        $sales = OrderList::select('categories.name as category', 'products.name as product', DB::raw('SUM(order_lists.count) as soldCount'), 'products.price as price', DB::raw('SUM(order_lists.total) as total'))
            ->join('products', 'order_lists.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_lists.order_id', '=', 'orders.id')
            ->whereDate('orders.date', '>=', $date->toDateString())
            ->where('products.id', $productId)
            ->groupBy('categories.name', 'products.name', 'products.price')
            ->get();

        return response()->json($sales);
    }
}
