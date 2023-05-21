<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Invoice;
use Livewire\Component;

class Booking extends Component
{
    public $innerBooking;
    public $order;

    public function __construct()
    {
        $this->order = Order::find(2);
    }

    public function render()
    {
        return view('livewire.booking', [
            "booking"  => new Booking,
            "orders"   => Order::all(),
            "invoices" => Invoice::all(),
        ]);
    }

    public function toggleBooking($value){
        $this->innerBooking = ($value === "inner_booking") ? true : false;
    }

    public function updateOrder(string $orderCode){
        $this->order = $orderCode ? Order::firstWhere("code", $orderCode) : Order::find(2);
    }
}
