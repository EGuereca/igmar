<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedore::all();
        return response()->json($proveedores);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'nullable|string|max:255',
        ]);

        $proveedor = Proveedore::create($validatedData);
        return response()->json($proveedor, 201);
    }

    public function show($id)
    {
        $proveedor = Proveedore::findOrFail($id);
        return response()->json($proveedor);
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedore::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'nullable|string|max:255',
        ]);

        $proveedor->update($validatedData);
        return response()->json($proveedor);
    }

    public function destroy($id)
    {
        $proveedor = Proveedore::findOrFail($id);
        $proveedor->delete();
        return response()->json(null, 204);
    }
}
