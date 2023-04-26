<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Article;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\OrderFormRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\AddArticleToCartFormRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.order.index", ["orders" => Order::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $suppliers = Supplier::all();
        $articles = Article::all();

        return view("dashboard.order.form", [
            "order" => new Order,
            "suppliers" => $suppliers,
            "articles" => $articles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderFormRequest $request)
    {
        $validated = $request->validated();
        
        $order = Order::create();
        $order->setCode();
        
        $supplier = Supplier::where("code", $validated["supplier"])->first();
        $order->supplier()->associate($supplier);
        $order->save();
        
        $cartItems = Cart::instance("order")->content();
        foreach ($cartItems as $item){
            $article = $item->model;

            $order->articles()->attach($article->id, [
                "price" => $article->unit_purchase_price,
                "quantity_ordered" => $item->qty,
            ]);
        }

        Cart::instance("order")->destroy();

        return redirect()->route("order.index")->with("success", "La commande a été sauvegardée avec succès !");
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
    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with("success", "La commande a été supprimée avec succès");
    }
}
