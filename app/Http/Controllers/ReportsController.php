<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderSeeker;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function showMenu() : View{
        return view('reports.menu', [
            'users' => User::all()
        ]);
    }

    public function users() : View{
        return view('reports.users', [
            'users' => User::latest()->paginate(20)
        ]);
    }

    public function orders() : View{
        return view('reports.orders', [
            'orderseekers' => OrderSeeker::latest()->paginate(20)
        ]);
    }
    
}
