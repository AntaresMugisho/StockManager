<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFormRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.client.index", [
            "clients" => Client::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.client.form", [
            "client" => new Client()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientFormRequest $request)
    {
        $client = Client::create($request->validated());
        $client->update(
            ["code" => sprintf("CLT-%05d", $client->id)]
        );
        return redirect()->route("client.index")->with("success", "Le client a été ajouté avec succès !");
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
    public function edit(Client $client)
    {
        return view("dashboard.client.form", compact("client"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientFormRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route("client.index")->with("success", "Les informations sur le client ont été mises à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route("client.index")->with("success", "Le client a été définitivement supprimé !");
    }
}
