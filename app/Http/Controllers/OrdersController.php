<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // All orders
    public function index() : View {
        return view('orders.index');
    }

    // Order details
    public function show(Order $order) : View {
        return view('orders.show', [
            'order' => $order
        ]);
    }
}
