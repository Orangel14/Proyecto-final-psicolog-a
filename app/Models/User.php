<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomVerifyEmail;
use App\Mail\CustomResetPassword;
use Carbon\Carbon;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\Role;
use App\Models\Post;
use App\Models\Comment;
use App\Models\UserProfile;
use App\Models\Publicador;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'dni',
        'nacionality',
        'date_of_birth',
        'address',
        'biography',
        'security_question',
        'security_answer',
        'email_verified_at',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y', strtotime($value));
    }

    public function getFechaNacimientoAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getFechaExpiracionPasaporteAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function checkRoles($roles)
    {

        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(404);
        }

        return $this->hasRole($roles) || abort(404);
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sendEmailVerificationNotification()
    {
        try {
            Mail::to($this->email)->send(new CustomVerifyEmail($this));
        } catch (TransportExceptionInterface $e) {
            dd($e);

            Log::error('Error al enviar el correo de verificación de correo electrónico: ' . $e->getMessage());

            toastr()->error('Error al enviar el correo de verificación de correo electrónico');
        }
    }

    public function sendPasswordResetNotification($token)
    {
        try {
            Mail::to($this->email)->send(new CustomResetPassword($this, $token));
        } catch (TransportExceptionInterface $e) {
            dd($e);
            Log::error('Error al enviar el correo de restablecimiento de contraseña: ' . $e->getMessage());

            toastr()->error('Error al enviar el correo de restablecimiento de contraseña');
        }
    }


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->security_answer = bcrypt($user->security_answer);
          
        });
        // Evento que se ejecuta después de crear un modelo nuevo
        static::created(function ($user) {
            if ($user->role == 'publicador') {
                Publicador::create([
                    'user_id' => $user->id,
                ]);
            } else {
               UserProfile::create([
                    'user_id' => $user->id,
                ]);
            }
        });
    }

    public function publicador() {
        return $this->hasOne(Publicador::class);
    }

    public function userProfile() {
        return $this->hasOne(UserProfile::class);
    }
}

