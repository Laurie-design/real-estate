<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index() {
        $owners = Auth::user()->owners;
        return view("agent.owner_list", compact("owners"));
    }

    public function create() {
        return view("agent.owner_new");
    }

    public function store(Request $request) {
        $request->validate([
            "name"=> "required",
            "email"=> "required",
            "tel"=> "required",
        ]);
        $newOwner = new Owner();
        $newOwner->name = $request->name;
        $newOwner->email = $request->email;
        $newOwner->tel = $request->tel;
        $newOwner->user_id = Auth::user()->id;
        $newOwner->save();
        return redirect()->route("agent.owner.list")->with("success","Propriétaire créé avec succès.");
    }

    public function edit($id) {
        $owner = Owner::findOrFail($id);
        return view('agent.owner_edit', compact('owner'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            "name"=> "required",
            "email"=> "required",
            "tel"=> "required",
        ]);
        $owner = Owner::findOrFail($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->tel = $request->tel;
        $owner->save();
        return redirect()->route("agent.owner.list")->with("success","Propriétaire modifié avec succès.");
    }

    public function destroy($id) {
        $owner = Owner::findOrFail($id);
        $propCount = $owner->properties->count();
        if ($propCount > 0) {
            return back()->with('error', "Ce propritétaire a des bien enregistrés. Il ne peut être supprimé");
        }
        $owner->delete();
        return redirect()->route('agent.owner.list')->with('success', "Propriétaire supprimé avec succès");
    }
}
