<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::all();
        return response()->json($comentarios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'comentario' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $comentario = Comentario::create($validatedData);
        return response()->json($comentario, 201);
    }

    public function show($id)
    {
        $comentario = Comentario::findOrFail($id);
        return response()->json($comentario);
    }

    public function update(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);

        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'comentario' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $comentario->update($validatedData);
        return response()->json($comentario);
    }

    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return response()->json(null, 204);
    }
}
