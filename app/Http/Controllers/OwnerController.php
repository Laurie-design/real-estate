<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index() {
        $owners = Owner::all();
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
        $newOwner->save();
        return redirect()->route("agent.owner.list")->with("success","Propriétaire créé avec succès.");
    }
}
