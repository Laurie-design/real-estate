<?php

namespace App\Http\Controllers;

use App\Models\Property;

class HomeController extends Controller
{
    public function index() {
        $properties = Property::all();
        return view('home.home', compact('properties'));
    }

}
