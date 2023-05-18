<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Invoice;
use Livewire\Component;

class Booking extends Component
{
    public $innerBooking = false;
    public $order;

    public function render()
    {
        return view('livewire.booking', [
            "booking"  => new Booking,
            "orders"   => Order::all(),
            "order"    => Order::find(1),
            "invoices" => Invoice::all(),
        ]);
    }

    public function toggleBooking(){
        $this->innerBooking =! $this->innerBooking;
    }

    public function updateOrder(int $id){
        $this->order = Order::find($id);
    }
}
