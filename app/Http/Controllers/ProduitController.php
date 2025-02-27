<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        $clients = Client::all();
        return view('produit.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'qte_stock' => 'required|integer|min:1',
            'prix' => 'required|integer|min:1',
            'file' => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048' ,

        ]);


        $Produit = new Produit();
        $Produit->nom = $request->input('produit-name');
        $Produit->qte_stock = $request->input('produit-quantite');
        $Produit->prix = $request->input('prix');


        if ($request->hasFile('file')) {
            $Produit->image = $request->file('file')->store('images','public');
        }

        return redirect()->route('commandes.index')->with('success', 'Produit créée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
