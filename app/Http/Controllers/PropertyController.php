<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index(Request $request) {
        $searchTerms = explode(" ", $request->input("search"));
        $type = $request->input("type");
        $price_min = $request->input("price_min");
        $price_max = $request->input("price_max");
        $surface_min = $request->input("surface_min");
        $surface_max = $request->input("surface_max");
        $searchRequest = $this->searchPropertiesByTerms($searchTerms, null);
        $searchRequest = $type ? $this->searchPropertiesByType($type, $searchRequest) : $searchRequest;
        $searchRequest = $this->searchPropertiesByPrice($price_min, $price_max, $searchRequest);
        $searchRequest = $this->searchPropertiesBySurface($surface_min, $surface_max, $searchRequest);
        // dd($searchRequest, $searchRequest->get());
        $searchRequest = $searchRequest ? $searchRequest->where('is_public', true) : Property::where('is_public', true);
        $properties = $searchRequest->get();
        return view("properties.properties_visitor_list", compact('properties'))->with('input',request()->all());
    }

    public function indexAgent(Request $request) {
        $properties = Property::all();
        return view('agent.properties_list', compact('properties'));
    }

    public function show($id) {
        $property = Property::findOrFail($id);
        return view('agent.properties_show', compact('property'));
    }

    public function visitorShow($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.property_visitor_show', compact('property'));
    }


    public function create() {
        $owners = Owner::all();
        return view('agent.property_new', compact('owners'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'owner_id' => 'required',
            'floor_number' => 'required|integer',
            'furnished' => 'required|boolean',
            'total_floors' => 'required|integer',
            'surface' => 'required|integer',
            // 'label' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        try {
            $imageName = null;
            $image1Name = null;
            $image2Name = null;
            if ($request->hasFile('image')) {
                $imageName = Str::random(15) . '.' . $request->image->extension();
                $request->image->move(public_path('storage'), $imageName);
            }
            if ($request->hasFile('image1')) {
                $image1Name = Str::random(15) . '.' . $request->image1->extension();
                $request->image1->move(public_path('storage'), $image1Name);
            }
            if ($request->hasFile('image2')) {
                $image2Name = Str::random(15) . '.' . $request->image2->extension();
                $request->image2->move(public_path('storage'), $image2Name);
            }
            
        } catch (\Exception $e) {
            return redirect()->back('agent.property.list')->with('success','Propriété ajoutée avec succès!');
        }

        Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'address' => $request->address,
            'owner_id' => $request->owner_id,
            'floor_number' => $request->floor_number,
            'furnished' => $request->furnished,
            'is_public' => $request->input('is_public', false) ? 1 : 0,
            'total_floors' => $request->total_floors,
            'surface' => $request->surface,
            // 'label' => $request->label,
            'type' => $request->type,
            'image_path' => $imageName,
            'image1_path' => $image1Name,
            'image2_path' => $image2Name,
        ]);

        return redirect()->route('agent.property.list')->with('success','Propriété ajoutée avec succès!');
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $owners = Owner::all();
        return view('agent.property_edit', compact('property', 'owners'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string|max:255',
            'owner_id' => 'required',
            'floor_number' => 'required|integer',
            'furnished' => 'required|boolean',
            'total_floors' => 'required|integer',
            'surface' => 'required|integer',
            'type' => 'required|string|max:255',
            // 'label' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $property = Property::findOrFail($id);
        $validatedData['is_public'] = $request->input('is_public', false) ? 1 : 0;

        $property->update($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imagePath);
            $property->image_path = $imagePath;
        }

        $property->save();

        return redirect()->route('agent.property.show', $property->id)->with('success', 'Le bien a été mis à jour avec succès.');
    }


    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        $property->delete();
        return redirect()->back()->with('success','Bien supprimé avec succès');
    }


    public function showAllProperties()
    {
        $properties = Property::all();
        return view('properties', compact('properties'));
    }

    private function searchPropertiesByTerms(Array $searchTerms, $searchRequest=null) {
        foreach ($searchTerms as $term) {
            $term = trim($term);
            if (!$term) {
                continue;
            }
            $searchRequest = $searchRequest ? $searchRequest->orWhere('title', 'like', '%'.$term.'%') : Property::where('title', 'like', '%'.$term.'%');
            $searchRequest = $searchRequest->orWhere('description', 'like', '%'.$term.'%')
                ->orWhere('address', 'like', '%'.$term.'%');
        }
        return $searchRequest;
    }

    private function searchPropertiesByType(String $type, $searchRequest=null) {
        return $searchRequest ? $searchRequest->where('type', $type) : Property::where('type', $type);
    }

    private function searchPropertiesByPrice($min, $max, $searchRequest=null) {
        if ($min) {
            $searchRequest = $searchRequest ? $searchRequest->where('price', '>=', $min) : Property::where('price', '>=', $min);
        }
        if ($max) {
            $searchRequest = $searchRequest ? $searchRequest->where('price', '<=', $max) : Property::where('price', '<=', $max);
        }
        return $searchRequest;
    }

    private function searchPropertiesBySurface($min, $max, $searchRequest) {
        if ($min) {
            $searchRequest = $searchRequest ? $searchRequest->where('surface', '>=', $min) : Property::where('surface', '>=', $min);
        }
        if ($max) {
            $searchRequest = $searchRequest ? $searchRequest->where('surface', '<=', $max) : Property::where('surface', '<=', $max);
        }
        return $searchRequest;
    }
}
