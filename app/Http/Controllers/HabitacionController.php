<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::all();
        return response()->json($habitaciones);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numero_habitacion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'precio_por_noche' => 'required|numeric|min:0',
        ]);

        $habitacion = Habitacion::create($validatedData);
        return response()->json($habitacion, 201);
    }

    public function show($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return response()->json($habitacion);
    }

    public function update(Request $request, $id)
    {
        $habitacion = Habitacion::findOrFail($id);

        $validatedData = $request->validate([
            'numero_habitacion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'precio_por_noche' => 'required|numeric|min:0',
        ]);

        $habitacion->update($validatedData);
        return response()->json($habitacion);
    }

    public function destroy($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->delete();
        return response()->json(null, 204);
    }
}
