<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biens= Bien::all();
        return view('bien.liste', compact('biens'));
    }

    public function create()
    {
        return view("bien.ajouter");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'type' => 'required',
            'prix' => 'required',
            'nbr_chambre'=> 'required',
            'nbr_etage'=> 'required',
            'num_etage'=> 'required',
            'meuble'=> 'required',
            'superficie'=> 'required',
            'description' => 'required',
            'libelle' => 'required',
            'image' => 'required',
            'is_public' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',

        ]);

        $bien = new Bien();
        $bien ->address = $request->address;
        $bien ->type = $request->type;
        $bien ->prix = $request->prix;
        $bien ->nbr_chambre = $request->nbr_chambre;
        $bien ->nbr_etage = $request->nbr_etage;
        $bien ->num_etage = $request->num_etage;
        $bien ->meuble = $request->meuble;
        $bien ->superficie = $request->superficie;
        $bien -> description = $request->description;
        $bien -> libelle = $request->libelle;
        $bien -> image= $request->image;
        $bien -> is_public = $request->has('is_public') ? 1 : 0;
        $bien -> is_active = $request->has('is_active') ? 1 : 0;
        $bien->user_id = auth()->id();
        $bien ->save();



        return redirect('/ajouter')->with('status', "Le bien été ajouté avec succès.");
    }

    public function update($id)
    {
        $etudiants = Bien::find($id);
        return view ('bien.update', compact('biens'));
    }

    public function update_bien_traitement(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'type' => 'required',
            'prix' => 'required',
            'nbr_chambre'=> 'required',
            'nbr_etage'=> 'required',
            'num_etage'=> 'required',
            'meuble'=> 'required',
            'superficie'=> 'required',
            'description' => 'required',
            'libelle' => 'required',
            'image' => 'required',
            'is_public' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $bien = Bien::find($request->id);
        $bien ->address = $request->address;
        $bien ->type = $request->type;
        $bien ->prix = $request->prix;
        $bien ->nbr_chambre = $request->nbr_chambre;
        $bien ->nbr_etage = $request->nbr_etage;
        $bien ->num_etage = $request->num_etage;
        $bien ->meuble = $request->meuble;
        $bien ->superficie = $request->superficie;
        $bien -> description = $request->description;
        $bien -> libelle = $request->libelle;
        $bien -> image = $request->imgs;
        $bien -> is_public = $request->has('is_public') ? 1 : 0;
        $bien -> is_active = $request->has('is_active') ? 1 : 0;
        $bien->update();

        return redirect('/bien')->with('status', "Le bien été modifié avec succès.");
    }



    public function delete($id)
    {
        $etudiant = Bien::find($id);
        $etudiant->delete();

        return redirect('/bien')->with('status', "Le bien été supprimé avec succès.");
    }
}
