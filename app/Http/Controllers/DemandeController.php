<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Property;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::all();
        return view("agent.demandes_list", compact("demandes"));
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'tel'=> 'required',
        ]);
        $property = Property::findOrFail($id);
        $newDemande = new Demande();
        $newDemande->property_id = $id;
        $newDemande->tel_client = $request->tel;
        $newDemande->save();
        return redirect()->back()->with('success',"Demande enregistrée");
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
