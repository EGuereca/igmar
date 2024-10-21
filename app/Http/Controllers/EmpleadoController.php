<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return response()->json($empleados);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        $empleado = Empleado::create($validatedData);
        return response()->json($empleado, 201);
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return response()->json($empleado);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        $empleado->update($validatedData);
        return response()->json($empleado);
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return response()->json(null, 204);
    }
}
