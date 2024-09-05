<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Requete;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequeteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requetes = Requete::where('district', Auth::user()->district1)
            ->orWhere('district', Auth::user()->district2)
            ->orWhere('district', Auth::user()->district3)
            ->get();
        return view("agent.requetes_list", compact("requetes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Categorie::all();
        $users_district = User::select('district1', 'district2', 'district3')->get();
        $districts = [];
        foreach ($users_district as $user) {
            $user->district1 ? $districts[$user->district1] = $user->district1 : null;
            $user->district2 ? $districts[$user->district2] = $user->district2 : null;
            $user->district3 ? $districts[$user->district3] = $user->district3 : null;
        }
        return view("requete.requete_visitor_new", compact('categories', 'districts'))->with("input", $request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "district"=> "required",
            "tel"=> "required",
            "categorie_id"=> "required",
        ], [
            "tel.required" => "Veuillez entrer votre numéro de téléphone",
        ]);
        $cat = Categorie::findOrFail($request->categorie_id);
        $newReq = new Requete();
        $newReq->district = $request->district;
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
