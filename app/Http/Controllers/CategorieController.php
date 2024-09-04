<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    public function index() {
        $categories = Auth::user()->categories;
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
        $newCategorie->user_id = Auth::user()->id;
        $newCategorie->save();
        return redirect()->route("agent.categorie.list")->with("success","Catégorie créé avec succès.");
    }

    public function edit($id) {
        $categorie = Categorie::findOrFail($id);
        return view('agent.categorie_edit', compact('categorie'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            "name"=> "required",
            "description"=> "required",
        ]);
        $cat = Categorie::findOrFail($id);
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->save();
        return redirect()->route("agent.categorie.list")->with("success","Catégorie modifiée avec succès.");
    }

    public function destroy($id) {
        $categorie = Categorie::findOrFail($id);
        $propCount = $categorie->properties->count();
        if ($propCount > 0) {
            return back()->with('error', "Cette est liée à des bien. Elle ne peut pas être supprimée");
        }
        $categorie->delete();
        return redirect()->route('agent.categorie.list')->with('success', "Catégorie supprimée");
    }
}
