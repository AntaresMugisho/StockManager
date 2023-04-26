<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddArticleToCartFormRequest;
use App\Models\Article;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddArticleToCartFormRequest $request)
    {
        $validated = $request->validated();
        
        $article = Article::where("code", $validated["article"])->first();
        
        Cart::instance("order")->add([
            "id" => $article->id,
            "name" => $article->name,
            "qty" => $validated["quantity"],
            "price" => $article->unit_purchase_price,
        ])->associate(Article::class);

        return back()->with("success", "L'article {$article->code} a été ajouté au panier");
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
    public function destroy(string $rowId)
    {
        Cart::instance("order")->remove($rowId);
        return back()->with("success", "L'article a été rétiré de la commande");
    }
}
