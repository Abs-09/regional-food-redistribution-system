<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class OrderCard extends Component
{

    public $order;
    public $distributor_id = '';

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function assignDistributor()
    {
        dd($this->distributor_id);
    }

    public function render()
    {
        return view('livewire.orders.order-card', [
            'distributors' => User::where('type', 'distributor')->get(),
        ]);
    }
}
