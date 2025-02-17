<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'publicador_id',
        'dia',
        'hora',            
        'hora_salida',
        'termino',
    ];


    // Relación con Psicólogo (Publicador)
    public function psicologo()
    {
        return $this->belongsTo(Publicador::class);
    }

    // Relación con Paciente (UserProfile)
    public function paciente()
    {
        return $this->belongsTo(UserProfile::class);
    }

    // Relación con Horario
    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

}
