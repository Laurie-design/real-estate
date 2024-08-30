<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Owner;
use App\Models\Property;
use App\Models\Requete;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $nOwners = Owner::count();
        $nProperties = Property::count();
        $nRequest = Requete::count();
        $nDemandes = Demande::count();
        return view('agent.dashboard', compact('nOwners', 'nProperties', 'nRequest', 'nDemandes'));
    }
}
