<?php

namespace App\Http\Controllers;
use App\Models\Publicador;
use App\Models\Horario;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PsicologosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $dias = [
            'Lunes',
            'Martes',
            'Miercoles',
            'Jueves',
            'Viernes',
            'Sabado',
            'Domingo',
        ];       
       

            
            $publicador = Publicador::where('user_id', Auth::id())->first();

            $tieneHorarios = $publicador ? Horario::where('publicador_id', $publicador->id)->exists() : false;

            if ($tieneHorarios) {
                return view('psicologos.actualizar', compact('dias', 'publicador'))->with('error', 'Ya tienes horarios registrados. Actualízalos en lugar de crear nuevos.');
            }

            return view('psicologos.index', compact('dias'));
         
      }
    



    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {         
             
        
         // Validar los datos del formulario
         $request->validate([
            'numero_colegiatura' => 'nullable|string|max:50',
            'experiencia' => 'nullable|string|max:120',
            'verificado' => 'nullable|boolean',
            'enfermedades_tratadas' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|',
            'instagram' => 'nullable|string|',
            'formacion' => 'nullable|string',
            'dia' => 'required|array', // Asegurar que los días sean un array
            'horarios.*' => 'required|array|min:1', // Asegurar que haya al menos un horario
            'horarios.*.dia' => 'required_with:horarios|string',
            'horarios.*.hora' => 'required_with:horarios|date_format:H:i',
            'termino' => 'nullable|string|',
         ],
         [
            'numero_colegiatura.nullable' => 'El número de colegiatura es opcional.',
            'numero_colegiatura.string' => 'El número de colegiatura debe ser una cadena de texto.',
            'numero_colegiatura.max' => 'El número de colegiatura no debe exceder los 50 caracteres.',
            'experiencia.nullable' => 'La experiencia es opcional.',
            'experiencia.string' => 'La experiencia debe ser una cadena de texto.',
            'verificado.nullable' => 'El campo verificado es opcional.',
            'verificado.boolean' => 'El campo verificado debe ser verdadero o falso.',
            'enfermedades_tratadas.nullable' => 'Las enfermedades tratadas son opcionales.',
            'enfermedades_tratadas.string' => 'Las enfermedades tratadas deben ser una cadena de texto.',
            'enfermedades_tratadas.max' => 'Las enfermedades tratadas no deben exceder los 120 caracteres.',
            'facebook.nullable' => 'El campo de Facebook es opcional.',
            'facebook.string' => 'El campo de Facebook debe ser una cadena de texto.',
            'instagram.nullable' => 'El campo de Instagram es opcional.',
            'instagram.string' => 'El campo de Instagram debe ser una cadena de texto.',
            'formacion.nullable' => 'La formación es opcional.',
            'formacion.string' => 'La formación debe ser una cadena de texto.',
            'horarios.nullable' => 'Los horarios son opcionales.',
            'horarios.array' => 'Los horarios deben ser un array.',
            'horarios.*.dia.required_with' => 'El día es obligatorio cuando se proporcionan horarios.',
            'horarios.*.dia.string' => 'El día debe ser una cadena de texto.',
            'horarios.*.hora.required_with' => 'La hora es obligatoria cuando se proporcionan horarios.',
            'horarios.*.hora.date_format' => 'La hora debe tener el formato HH:MM.',
         ]);

         $publicador = Publicador::where('user_id', Auth::id())->first();

         if ($publicador) {
             // Si existe, actualizar los datos
             $publicador->update([
                 'numero_colegiatura' => $request->numero_colegiatura,
                 'experiencia' => $request->experiencia,
                 'verificado' => $request->verificado ?? 0,
                 'enfermedades_tratadas' => $request->enfermedades_tratadas,
                 'facebook' => $request->facebook,
                 'instagram' => $request->instagram,
                 'formacion' => $request->formacion,
             ]);
                // Si se enviaron horarios, los guardamos
        
                $dia = $request->dia;
                $hora = $request->hora;
                $hora_salida = $request->hora_salida;
                $termino = $request->termino;
                $user = Auth::user();
                
                foreach ($dia as $key => $value) {
                   
                    Horario::create([
                        'publicador_id' => $publicador->id,
                        'dia' => $value,
                        'hora' => $hora[$key],
                        'hora_salida' => $hora_salida[$key],
                        'termino' => $termino,
                    ]);

                }
     
             
        return redirect('/nosotros')->with('success', 'Psicólogo registrado correctamente.');

         } else {
             // Si no existe, crearlo
             Publicador::create([
                 'user_id' => Auth::id(),
                 'numero_colegiatura' => $request->numero_colegiatura,
                 'experiencia' => $request->experiencia,
                 'verificado' => $request->verificado ?? 0,
                 'enfermedades_tratadas' => $request->enfermedades_tratadas,
                 'facebook' => $request->facebook,
                 'instagram' => $request->instagram,
                 'formacion' => $request->formacion,
             ]);
        // Si se enviaron horarios, los guardamos
        
        $dia = $request->dia;
        $hora = $request->hora;
        $hora_salida = $request->hora_salida;
        $termino = $request->termino;
        $user = Auth::user();
        
        foreach ($dia as $key => $value) {
           
            Horario::create([
                'publicador_id' => $publicador->id,
                'dia' => $value,
                'hora' => $hora[$key],
                'hora_salida' => $hora_salida[$key],
                'termino' => $termino,
            ]);

        }

        return redirect('/nosotros')->with('success', 'Psicólogo registrado correctamente.');

            
         }
            

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicador $publicador)
    {
        

        // dd($request->all());

        // Validación de datos generales
        $data = $request->validate([
            'numero_colegiatura'      => 'nullable|string|max:50',
            'experiencia'             => 'nullable|string',
            'verificado'              => 'nullable|boolean',
            'enfermedades_tratadas'   => 'nullable|string|max:255',
            'facebook'                => 'nullable|string',
            'instagram'               => 'nullable|string',
            'formacion'               => 'nullable|string',
            // Validación de horarios: aquí se espera un array indexado por el nombre del día.
            'horarios'                => 'nullable|array',
            'horarios.*.dia'          => 'required_with:horarios|string',
            'horarios.*.hora'         => 'nullable|date_format:H:i',
            'horarios.*.hora_salida'  => 'nullable|date_format:H:i',
            'termino'                 => 'nullable|string',
        ], [
            'numero_colegiatura.nullable' => 'El número de colegiatura es opcional.',
            'numero_colegiatura.string' => 'El número de colegiatura debe ser una cadena de texto.',
            'numero_colegiatura.max' => 'El número de colegiatura no debe exceder los 50 caracteres.',
            'experiencia.nullable' => 'La experiencia es opcional.',
            'experiencia.string' => 'La experiencia debe ser una cadena de texto.',
            'verificado.nullable' => 'El campo verificado es opcional.',
            'verificado.boolean' => 'El campo verificado debe ser verdadero o falso.',
            'enfermedades_tratadas.nullable' => 'Las enfermedades tratadas son opcionales.',
            'enfermedades_tratadas.string' => 'Las enfermedades tratadas deben ser una cadena de texto.',
            'enfermedades_tratadas.max' => 'Las enfermedades tratadas no deben exceder los 45 caracteres.',
            'facebook.nullable' => 'El campo de Facebook es opcional.',
            'facebook.string' => 'El campo de Facebook debe ser una cadena de texto.',
            'instagram.nullable' => 'El campo de Instagram es opcional.',
            'instagram.string' => 'El campo de Instagram debe ser una cadena de texto.',
            'formacion.nullable' => 'La formación es opcional.',
            'formacion.string' => 'La formación debe ser una cadena de texto.',
            'horarios.nullable' => 'Los horarios son opcionales.',
            'horarios.array' => 'Los horarios deben ser un array.',
            'horarios.*.dia.required_with' => 'El día es obligatorio cuando se proporcionan horarios.',
            'horarios.*.dia.string' => 'El día debe ser una cadena de texto.',
            'horarios.*.hora.required_with' => 'La hora es obligatoria cuando se proporcionan horarios.',
            'horarios.*.hora.date_format' => 'La hora debe tener el formato HH:MM.',
        ]);
    
        // Actualizamos datos generales del publicador
        $publicador->update([
            'numero_colegiatura'      => $data['numero_colegiatura'] ?? $publicador->numero_colegiatura,
            'experiencia'             => $data['experiencia'] ?? $publicador->experiencia,
            'verificado'              => $data['verificado'] ?? $publicador->verificado,
            'enfermedades_tratadas'   => $data['enfermedades_tratadas'] ?? $publicador->enfermedades_tratadas,
            'facebook'                => $data['facebook'] ?? $publicador->facebook,
            'instagram'               => $data['instagram'] ?? $publicador->instagram,
            'formacion'               => $data['formacion'] ?? $publicador->formacion,
        ]);

    Horario::where('publicador_id', $publicador->id)->delete();

    foreach ($request->horarios as $dia => $horarioData) {
        if (!empty($horarioData['hora']) && !empty($horarioData['hora_salida'])) {
            // Convertir las horas al formato correcto
            $hora = date('H:i', strtotime($horarioData['hora']));
            $hora_salida = date('H:i', strtotime($horarioData['hora_salida']));

            
            Horario::updateOrCreate(
                ['publicador_id' => $publicador->id, 'dia' => $dia],
                ['hora' => $hora, 'hora_salida' => $hora_salida, 'termino' => $request->termino]
            );
        }
    }

        return redirect()->route('psicologos.index')->with('success', 'Datos actualizados correctamente');
    }
    

    public function list()
    {

       
       
        $publicador = Publicador::with('horarios')->where('user_id', '!=' , auth()->user()->id)->whereNotNull('enfermedades_tratadas')->get();
        
        return view('psicologos.list', compact('publicador'));
        

    }


    public function createCita(Request $request)
    {
       
        // dd($request->all());
        $request->validate([
            'dia' => 'nullable|string|max:12',
            'hora' => 'nullable|string|max:120',
            'plataforma' => 'nullable|in:ws,discord,zoom',
            'motivo' => 'nullable|string|max:120',            
         ],
         [
            'dia.nullable' => 'El día es opcional.',
            'dia.string' => 'El día debe ser una cadena de texto.',
            'dia.max' => 'El día no debe exceder los 12 caracteres.',
            'hora.nullable' => 'La hora es opcional.',
            'hora.string' => 'La hora debe ser una cadena de texto.',
            'hora.max' => 'La hora no debe exceder los 120 caracteres.',
            'plataforma.nullable' => 'La plataforma es opcional.',
            'plataforma.in' => 'La plataforma debe ser una de las siguientes: ws, discord, zoon.',
            'motivo.nullable' => 'El motivo es opcional.',
            'motivo.string' => 'El motivo debe ser una cadena de texto.',
            'motivo.max' => 'El motivo no debe exceder los 120 caracteres.',
         ]);

       $horario = Horario::find($request->horario);

        
        Cita::create([
            'publicador_id' => $request->publicador_id,
            'user_id' => $request->user_id,
            'dia' => $horario->dia,
            'hora' => $horario->hora,
            'plataforma' => $request->plataforma,
            'motivo' => $request->motivo,
            
        ]);

        return redirect()->route('psicologos.list')->with('success', 'Cita creada correctamente.');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          //
    }

}

