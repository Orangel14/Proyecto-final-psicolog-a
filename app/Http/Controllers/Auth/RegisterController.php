<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RegisterController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = '/email/verify';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
       'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'security_question' => ['required', 'string', 'max:255'],
      'security_answer' => ['required', 'string', 'max:255'],
      'nacionality' => ['required', 'string', 'max:255'],
      'dni' => ['required', 'string', 'max:255', 'unique:users'],
      'full_name' => ['required', 'string', 'max:255'],
      'date_of_birth' => ['required', 'date'],	
      
    ],
      [
        'nacionality.required' => 'La nacionalidad es requerida',
        'dni.required' => 'La cédula es requerida',
        'dni.unique' => 'La cédula ya está en uso',
        'date_of_birth.required' => 'La fecha de nacimiento es requerida',
        'full_name.required' => 'Ocurrió un error, por favor intente de nuevo',
        'email.required' => 'El correo electrónico es requerido',
        'email.email' => 'El correo electrónico no es válido',
        'email.unique' => 'El correo electrónico ya está en uso',
        'email.confirmed' => 'Los correos electrónicos no coinciden',
        'password.required' => 'La contraseña es requerida',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        'password.confirmed' => 'Las contraseñas no coinciden',
      ]
    );
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function create(array $data)
  {       
      $user = User::create([
          'full_name' => $data['full_name'],
          'email'     => $data['email'],
          'password'  => bcrypt($data['password']),
          'role'      => $data['role'],   
          'nacionality' => $data['nacionality'],
          'dni' => $data['dni'],
          'date_of_birth' => $data['date_of_birth'],
          'security_question' => $data['security_question'],
          'security_answer' => $data['security_answer'],
          'biography' => $data['biography'],
          'address' => $data['address'],
      ]);
  
      // $user->roles()->attach(Role::where('name', 'publicador')->first());
          
       return $user;

      
  }

}
