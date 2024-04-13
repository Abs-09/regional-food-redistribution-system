<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\OrderSeeker;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderCard extends Component
{

    public $order;
    public $distributor_id = '';

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function acceptOrder()
    {
        $this->order->status = 'accepted';
        $this->order->save();
    }

    public function rejectOrder()
    {
        $this->order->status = 'rejected';
        $this->order->save();
    }

    public function completeOrder()
    {
        $this->order->status = 'delivered';
        DB::table('order_seekers')->where('order_id', $this->order->id)->update(['delivered_date'=> Carbon::now()]);
        $this->order->save();
    }

    public function failOrder()
    {
$this->order->status = 'failed';
        $this->order->save();
    }

    public function assignDistributor()
    {
        if ($this->order->seekers->isEmpty()) {
            session()->flash('message', 'Please assign at least one seeker to continue.');
            return redirect()->back();
        }

        if ($this->distributor_id == null) {
            session()->flash('message', 'Please select a distributor.');
            return redirect()->back();
        }

        $this->order->distributor_id = $this->distributor_id;
        $this->order->distributor_assigned_at = Carbon::now();
        $this->order->status = 'pending_delivery';
        $this->order->save();
    }

    public function render()
    {

        return view('livewire.orders.order-card', [
            'distributors' => User::where('type', 'distributor')->where('is_enabled', 1)->get(),
            'seekers' => User::where('type', 'seeker')->where('is_enabled', 1)->get(),
            'orderseekers' => OrderSeeker::where('order_id', $this->order->id)->get()
        ]);
    }
}
