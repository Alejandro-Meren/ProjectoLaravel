<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CitaController extends Controller
{
    public function index()
    {
        return Cita::with(['cliente', 'servicio', 'user'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_nombre' => 'required|string|max:255',
            'cliente_telefono' => 'required|string|max:255',
            'servicio_id' => 'required|exists:servicios,id',
            'fecha_hora' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        // Buscar o crear el cliente
        $cliente = Cliente::firstOrCreate(
            ['nombre' => $request->cliente_nombre],
            ['telefono' => $request->cliente_telefono]
        );

        $cita = Cita::create([
            'cliente_id' => $cliente->id,
            'servicio_id' => $request->servicio_id,
            'fecha_hora' => $request->fecha_hora,
            'user_id' => $request->user_id,
        ]);

        return response()->json($cita, 201);
    }

    public function update(Request $request, $id)
    {   
        Gate::allows('update', $id);
        $request->validate([
        'cliente_nombre' => 'required|string|max:255',
        'cliente_telefono' => 'required|string|max:255',
        'servicio_id' => 'required|exists:servicios,id',
        'fecha_hora' => 'required|date',
        'user_id' => 'required|exists:users,id',
     ]);

        $cita = Cita::findOrFail($id);

    // Buscar o crear el cliente
        $cliente = Cliente::firstOrCreate(
        ['nombre' => $request->cliente_nombre],
        ['telefono' => $request->cliente_telefono]
        );

        $cliente->update(['telefono' => $request->cliente_telefono]);

        $cita->update([
        'cliente_id' => $cliente->id,
        'servicio_id' => $request->servicio_id,
        'fecha_hora' => $request->fecha_hora,
        'user_id' => $request->user_id,
        ]   );

    

    

        return response()->json($cita, 200);
    }

public function destroy(Cita $cita)
{
    Gate::allows('delete', $cita);
    $cita->delete();

    return response()->json(['message' => 'Cita eliminada correctamente']);
}
}