<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        return view('agent.dashboard'); // Créez une vue dashboard.blade.php pour les agents
    }
}
