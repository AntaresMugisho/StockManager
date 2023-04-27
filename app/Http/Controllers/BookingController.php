<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.booking.index", ["bookings" => Booking::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.booking.form", [
            "booking"  => new Booking,
            "orders"   => Order::all(),
            "order"    => Order::find(1), // Just for tests
            "invoices" => Invoice::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->booking === "inner_booking"){

            $order = Order::firstWhere("code", $request->order);
            foreach ($order->articles as $article){
                if ($request->input($article->code) !== null){
                    $order->articles()->updateExistingPivot($article->id, [
                         "quantity_delivered" => $request->input($article->code),
                    ]);
                    // $order->save;
                }
                else{
                    return back()->with("warning", "Data usurpation");
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}