<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    // Méthode pour afficher la page Sales
    public function index()
    {
        return view('sales'); // Assurez-vous que la vue 'sales.blade.php' existe
    }
}
