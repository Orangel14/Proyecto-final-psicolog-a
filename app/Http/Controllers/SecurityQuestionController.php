<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SecurityQuestionController extends Controller
{
    // Mostrar el formulario para validar la pregunta
    public function create()
    {
        return view('auth.security-question');
    }

    // Validar la pregunta de seguridad y permitir el cambio de contraseña
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'security_answer' => 'required|string|max:255',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        // Verificar la respuesta de seguridad
        if ($user && Hash::check($request->security_answer, $user->security_answer)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            // Redirigir con un mensaje de éxito
            toastr()->success('¡Contraseña actualizada exitosamente!');
            return redirect()->route('login')->with('status', '¡Contraseña actualizada exitosamente!');
        }

        // Retornar con un mensaje de error
        toastr()->error('La respuesta de seguridad es incorrecta.');
        return back()->withErrors(['security_answer' => 'Respuesta incorrecta.']);
    }
}
