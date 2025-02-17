<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{

    protected $fillable = ['user_id', 'title', 'body', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function scopeVisibleToUser(Builder $query)
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            // Si el usuario es admin, retorna todos los posts
            return $query;
        } elseif ($user->hasRole('publicador')) {
            // Si el usuario es publicador, retorna solo los posts creados por él
            return $query->where('user_id', $user->id);
        }

        // Opcionalmente, puedes definir un caso por defecto
        return $query->where('user_id', $user->id);
    }
}
