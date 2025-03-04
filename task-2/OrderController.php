<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function lastOrders(): View
    {
        $orders = Order::with('manager')
            ->orderBy('created_at', 'desc')
            ->limit(50)
            ->get();

        return view('orders.last', [
            'orders' => $orders
        ]);
    }
}