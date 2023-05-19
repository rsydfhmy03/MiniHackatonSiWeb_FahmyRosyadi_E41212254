<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseApiController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return response()->json($houses);
    }

    public function store(Request $request)
    {
        $house = new House();
        // Assign values to house properties based on the request data
        $house->type = $request->input('type');
        $house->price = $request->input('price');
        // ... assign other properties
        
        $house->save();
        return response()->json($house, 201);
    }

    public function show($id)
    {
        $house = House::findOrFail($id);
        return response()->json($house);
    }

    public function update(Request $request, $id)
    {
        $house = House::findOrFail($id);
        // Update house properties based on the request data
        $house->type = $request->input('type');
        $house->price = $request->input('price');
        // ... update other properties

        $house->save();
        return response()->json($house);
    }

    public function destroy($id)
    {
        $house = House::findOrFail($id);
        $house->delete();
        return response()->json(null, 204);
    }
}
