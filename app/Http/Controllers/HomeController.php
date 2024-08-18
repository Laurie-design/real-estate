<?php

namespace App\Http\Controllers;

use App\Models\Property;

class HomeController extends Controller
{
    public function index() {
        $properties = Property::where("is_public", true)->limit(6)->get();
        return view('home.home', compact('properties'));
    }

}
