<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CitaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cita.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
        {
           
            $request->validate([
                'condiciones' => 'required|array', // Campo del select múltiple
                'contacto_emergencia' => 'required|string|max:100',
                'historial_medico' => 'nullable|boolean'
            ]);
    
            $user = Auth::user();
            
            // Convertir el array de condiciones a texto (ej: "CSS,HTML")
            $condicionesTexto = implode(', ', $request->condiciones);
    
            // Crear o actualizar el perfil del usuario
            $user->UserProfile()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'condicion' => $condicionesTexto,
                    'contacto_emergencia' => $request->contacto_emergencia,
                    'historial_medico' => $request->historial_medico ? 'Sí' : 'No'
                ]
            );
    
            return redirect()->route('paciente.index')->with('success', 'Datos guardados correctamente');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
