<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Auth::user()->demandes;
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
        $newDemande->user_id = $property->user_id;

        $newDemande->save();
        return redirect()->route('properties.list')->with('success',"Demande envoyée avec succès");
    }

    public function destroy(Request $request, $id)
    {
        $dem = Demande::findOrFail($id);
        $dem->delete();
        return redirect()->route('agent.demandes.list');
    }
}
