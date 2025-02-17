<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/home';

   public function username()
  {
      return 'email';
  }
  
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
    $this->middleware('auth')->only('logout');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
        'email' => ['required'],
        'password' => ['required'],
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if ($user) {
        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectPath());
        } else {
            return back()->withErrors([
                'email' => 'Estas credenciales no coinciden con nuestros registros.',
            ])->onlyInput('email');
        }
    } else {
        return back()->withErrors([
            'email' => 'Estas credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    return back()->withErrors([
        'email' => 'El usuario no es válido.',
    ])->onlyInput('email');
  }
}