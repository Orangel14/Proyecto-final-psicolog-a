<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model {


    protected $fillable = [
             'id',
            'user_id',
            'condicion',
            'historial_medico',
            'contacto_emergencia',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }
}