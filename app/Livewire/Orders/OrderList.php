<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = '';

    public function render()
    {
        $user = auth()->user();
        if ($user->type == 'admin') {
            $orders = Order::where('created_at', 'like', '%' . $this->search . '%')->when($this->filter,  function ($query, $filter) {
                return $query->where('status', $filter);
            })->latest()->paginate(9);
        } elseif ($user->type == 'donator') {
            $orders = Order::where('donator_id', $user->id)->where('created_at', 'like', '%' . $this->search . '%')->when($this->filter,  function ($query, $filter) {
                return $query->where('status', $filter);
            })->latest()->paginate(9);
        } elseif ($user->type == 'distributor') {
            $orders = Order::where('distributor_id', $user->id)->where('created_at', 'like', '%' . $this->search . '%')->when($this->filter,  function ($query, $filter) {
                return $query->where('status', $filter);
            })->latest()->paginate(9);
        }


        return view('livewire.orders.order-list', [
            'orders' => $orders
        ]);
    }
}
