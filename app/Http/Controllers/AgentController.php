<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Demande;
use App\Models\Owner;
use App\Models\Property;
use App\Models\Requete;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        // $nOwners = Owner::count();
        // $nProperties = Property::count();
        // $nCategories  = Categorie::count();
        // $nRequest = Requete::count();
        // $nDemandes = Demande::count();
        $nOwners = Auth::user()->owners->count();
        $nProperties = Auth::user()->properties->count();
        $nCategories  = Auth::user()->categories->count();
        $nRequest = $requetes = Requete::where('district', Auth::user()->district1)
            ->orWhere('district', Auth::user()->district2)
            ->orWhere('district', Auth::user()->district3)
            ->count();
        $nDemandes = Auth::user()->demandes->count();
        return view('agent.dashboard', compact('nOwners', 'nProperties', 'nRequest', 'nDemandes','nCategories'));
    }
}
