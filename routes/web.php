<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecurityQuestionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NosotrosControlador;
use App\Http\Controllers\ContactanosControlador;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PacienteControlador;
use App\Http\Controllers\PsicologosControlador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return redirect(route('home'));
});

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('home');

  Route::resource('posts', PostController::class);

  Route::get('/', function () {
      return view('homepage');
  })->name('homepage');

  Route::get('/comments', function () {
      return view('comments');
  })->name('comments');

  Route::get('/{post}/comments', [CommentController::class, 'index'])->name('comments.index');
  Route::post('/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::get('/nosotros', [NosotrosControlador::class, 'index'])->name('nosotros.index');

Route::get('/Informacion-Adicional', [PacienteControlador::class, 'index'])->name('paciente.index');
Route::middleware(['auth'])->group(function () {
  Route::get('/paciente', [PacienteControlador::class, 'index'])->name('paciente.index');
  Route::post('/paciente/guardar', [PacienteControlador::class, 'store'])->name('paciente.store');
});

Auth::routes(['verify' => true, 'reset' => true]);

Route::get('/Pregunta-Seguridad', [SecurityQuestionController::class, 'create'])->name('security-question.create');
Route::post('/security-question', [SecurityQuestionController::class, 'verify'])->name('security-question.verify');

Route::get('/', [PostController::class, 'all'])->name('posts.all');

Route::get('/posts/{post}', [PostController::class, 'single'])->name('posts.single');
Route::get('/contactanos', [ContactanosControlador::class, 'index'])->name('contactanos.index');

Route::get('/cita', [App\Http\Controllers\CitaControlador::class, 'index'])->name('cita.index');
Route::post('/cita/guardar', [App\Http\Controllers\CitaControlador::class, 'store'])->name('cita.store');


Route::middleware(['auth','psicologia'])->group(function () {
 Route::get('/Registro', [PsicologosControlador::class, 'index'])->name('psicologos.index');
 Route::post('/Psicologos-Registro', [PsicologosControlador::class, 'store'])->name('psicologos.store');

 Route::put('/publicador/{publicador}', [PsicologosControlador::class, 'update'])->name('psicologos.update');


});

Route::get('/publicadores', [PsicologosControlador::class, 'list'])->name('psicologos.list');


Route::post('/publicador/createCita', [PsicologosControlador::class, 'createCita'])->name('publicador.createCita');

