<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Requete;
use Illuminate\Http\Request;

class RequeteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requetes = Requete::all();
        return view("agent.requetes_list", compact("requetes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Categorie::all();
        return view("requete.requete_visitor_new", compact('categories'))->with("input",$request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "tel"=> "required",
            "categorie_id"=> "required",
        ], [
            "tel.required" => "Veuillez entrer votre numéro de téléphone",
        ]);
        $cat = Categorie::findOrFail($request->categorie_id);
        $newReq = new Requete();
        $newReq->tel_client = $request->tel;
        $newReq->type = $cat->name;
        $newReq->surface_min = $request->surface_min;
        $newReq->surface_max = $request->surface_max;
        $newReq->price_max = $request->price_max;
        $newReq->description = $request->search;
        $newReq->save();
        return redirect()->route("properties.list")->with("success","Votre requête a été envoyée avec succès");
    }


    public function destroy(Request $request, $id)
    {
        $req = Requete::findOrFail($id);
        $req->delete();
        return redirect()->route('agent.requetes.list');
    }
}
