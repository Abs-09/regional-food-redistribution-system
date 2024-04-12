<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\OrderSeeker;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class AssignSeeker extends ModalComponent
{

    public $seekerid;
    public Order $order;
    
    public function assignSeeker($seekerid) {

        if($this->order->platesRemaining() < 1) {
            session()->flash('assign-message', 'No plates remaining.');
            return redirect()->back();
        }

        if($this->order->hasSeeker($seekerid)){
            session()->flash('assign-message', 'The seeker is already assigned.');
            return redirect()->back();
        }

        $this->seekerid = $seekerid;

        $orderseeker = new OrderSeeker();
        $orderseeker->order_id = $this->order->id;
        $orderseeker->seeker_id = $this->seekerid;
        $orderseeker->save();

        session()->flash('assign-message', 'Seeker Assigned.');

        return redirect(route('orders.show', $this->order->id));

    }

    public function render()
    {
        $seekerrecords = OrderSeeker::orderBy('delivered_date', 'desc')->get();
        $seekers = User::where('type', 'seeker')->where('is_enabled', 1)->get();
        return view('livewire.orders.assign-seeker', [
            'seekerrecords' => $seekerrecords,
            'seekers' => $seekers,
        ]);
    }
}
