<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarsResource;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $carss = Cars::latest()->get();
        return response()->json([
            'message' => 'Car identity grasped', 
            'data' => CarsResource::collection($carss)->resolve(), 
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'brand' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'transmisi' => 'required|in:Manual,Matic,CVT',
            'bahan_bakar' => 'required|in:Bensin,Diesel,Hybrid,Listrik',
            'status' => 'sometimes|in:tersedia,sold',
            'foto' => 'nullable|url|max:2048',
        ]);
        $cars = Cars::create($validated);

        return response()->json(['message' => 'Car have been added', 'data' => (new CarsResource($cars))->resolve(),], 201);
    }

    public function show(string $id)
    {
        $cars = Cars::findOrFail($id);
        return response()->json(['message' => 'Car details have gotted', 'data' => (new CarsResource($cars))->resolve(),], 200);
    }
    
    public function update(Request $request, string $id)
    {
        $cars = Cars::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'brand' => 'sometimes|required|string|max:100',
            'harga' => 'sometimes|required|integer|min:0',
            'tahun' => 'sometimes|required|integer|min:1900|max:' . (date('Y') + 1),
            'transmisi' => 'sometimes|required|in:Manual,Matic,CVT',
            'bahan_bakar' => 'sometimes|required|in:Bensin,Diesel,Hybrid,Listrik',
            'status' => 'sometimes|required|in:tersedia,sold',
            'foto' => 'sometimes|nullable|url|max:2048',
        ]);
        $cars->update($validated);
        $cars->refresh();

        return response()->json(['message' => 'Car have been updated', 'data' => (new CarsResource($cars))->resolve(),], 200);
    }

    public function destroy(string $id)
    {
        $cars = Cars::findOrFail($id);
        $cars->delete();

        return response()->json(['message' => 'Car have been deleted', 'data' => null,], 200);
    }
}