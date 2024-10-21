<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return response()->json($pagos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'factura_id' => 'required|exists:faturas,id',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
        ]);

        $pago = Pago::create($validatedData);
        return response()->json($pago, 201);
    }

    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return response()->json($pago);
    }

    public function update(Request $request, $id)
    {
        $pago = Pago::findOrFail($id);

        $validatedData = $request->validate([
            'factura_id' => 'required|exists:faturas,id',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
        ]);

        $pago->update($validatedData);
        return response()->json($pago);
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();
        return response()->json(null, 204);
    }
}
