<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use LivewireUI\Modal\ModalComponent;

class AddOrder extends ModalComponent
{
    public $number_of_plates = '';
    public $description = '';

    public function save()
    {
        Order::create([
            'number_of_plates' => $this->number_of_plates,
            'description' => $this->description,
            'status' => "pending",
            'donator_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'Request created.');

        return redirect(route('orders.index'));
    }

    public function render()
    {
        return view('livewire.orders.add-order');
    }
}
