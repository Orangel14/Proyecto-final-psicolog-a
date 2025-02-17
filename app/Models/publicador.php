<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Publicador extends Model {
   
   
    protected $fillable = [
        'id',
        'user_id',
        'numero_colegiatura',
        'experiencia',
        'verificado',
        'enfermedades_tratadas',
        'facebook',
        'instagram',
        'formacion',
        'horario_id',    
    ];
      
    public function user() {
        return $this->belongsTo(User::class);
    }


    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    // Relación con Citas
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

}
