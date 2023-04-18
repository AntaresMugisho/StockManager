<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierFormRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.supplier.index", [
            "suppliers" => Supplier::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.supplier.form", [
            "supplier" => new Supplier()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierFormRequest $request)
    {
        $supplier = Supplier::create($request->validated());
        $supplier->update(
            ["code" => sprintf("FRN-%05d", $supplier->id)]
        );
        return redirect()->route("supplier.index")->with("success", "Le fournisseur a été ajouté avec succès !");
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
    public function edit(Supplier $supplier)
    {
        return view("dashboard.supplier.form", compact("supplier"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierFormRequest $request, Supplier $supplier)
    {
        $supplier->update($request->validated());
        return redirect()->route("supplier.index")->with("success", "Les informations sur le fournisseur ont été mises à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route("supplier.index")->with("success", "Le fournisseur a été définitivement supprimé !");
    }
}
