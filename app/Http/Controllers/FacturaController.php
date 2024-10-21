<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        return response()->json($facturas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'total' => 'required|numeric|min:0',
            'fecha_emision' => 'required|date',
        ]);

        $factura = Factura::create($validatedData);
        return response()->json($factura, 201);
    }

    public function show($id)
    {
        $factura = Factura::findOrFail($id);
        return response()->json($factura);
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);

        $validatedData = $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'total' => 'required|numeric|min:0',
            'fecha_emision' => 'required|date',
        ]);

        $factura->update($validatedData);
        return response()->json($factura);
    }

    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();
        return response()->json(null, 204);
    }
}
