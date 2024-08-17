<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index(Request $request) {
        $properties = Property::where('is_public', true)->get();
        return view("properties.properties_visitor_list", compact('properties'));
    }

    public function visitorShow($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.property_visitor_show', compact('property'));
    }


    public function create() {
        return view('properties.newproperty');
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'address' => 'required|string',
                'owner_name' => 'required|string|max:255',
                'owner_phone' => 'required|string|max:20',
                'owner_email' => 'required|email|max:255',
                'floor_number' => 'required|integer',
                'furnished' => 'required|boolean',
                'is_public' => 'required|boolean',
                'total_floors' => 'required|integer',
                'surface' => 'required|integer',
                'label' => 'required|string|max:255',
                'type' => 'required|string|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('storage'), $imageName);
            }

            Property::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'address' => $request->address,
                'owner_name' => $request->owner_name,
                'owner_phone' => $request->owner_phone,
                'owner_email' => $request->owner_email,
                'floor_number' => $request->floor_number,
                'furnished' => $request->furnished,
                'is_public' => $request->is_public,
                'total_floors' => $request->total_floors,
                'surface' => $request->surface,
                'label' => $request->label,
                'type' => $request->type,
                'image_path' => $imageName,
            ]);

            return response()->json(['success' => true, 'message' => 'Propriété ajoutée avec succès!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|string|max:15',
            'owner_email' => 'required|email|max:255',
            'floor_number' => 'required|integer',
            'furnished' => 'required|boolean',
            'total_floors' => 'required|integer',
            'surface' => 'required|integer',
            'type' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $property = Property::findOrFail($id);

        $property->update($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imagePath);
            $property->image_path = $imagePath;
        }

        $property->save();

        return redirect()->route('property.show', $property->id)->with('success', 'Le bien a été mis à jour avec succès.');
    }


    public function destroy($id)
    {
        $property = Property::find($id);

        if ($property) {
            $property->delete();
            return response()->json(['message' => 'Le bien a été supprimé avec succès.']);
        }

        return response()->json(['message' => 'Le bien n\'a pas été trouvé.'], 404);
    }


    public function showAllProperties()
    {
        $properties = Property::all();
        return view('properties', compact('properties'));
    }
}
