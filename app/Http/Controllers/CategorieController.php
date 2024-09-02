<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index() {
        $categories = Categorie::all();
        return view("agent.categorie_list", compact("categories"));
    }

    public function create() {
        return view("agent.categorie_new");
    }

    public function store(Request $request) {
        $request->validate([
            "name"=> "required",
            "description"=> "required",
            
        ]);
        $newCategorie = new Categorie();
        $newCategorie->name = $request->name;
        $newCategorie->description = $request->description;
        $newCategorie->save();
        return redirect()->route("agent.categorie.list")->with("success","Catégorie créé avec succès.");
    }
}
