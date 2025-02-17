<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\SolicitantesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['web', 'auth:sanctum'])->group(function () {
  Route::get('/user', function (Request $request) {
    return $request->user();
  });
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/documentos/{id}', [SolicitantesController::class, 'documentos'])->name('solicitantes.documentos');
Route::post('/persona', [SolicitantesController::class, 'persona'])->name('persona');

