
@extends('layouts.app')
@push('class-body')
d-block align-items-center bg-auth border-top border-top-2 border-primary 
@endpush
@push('styles')
<style>
  body {
    background-image: url('{{ asset('assets/img/diseno4.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
</style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-6 my-5">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <img src="{{ asset('assets/img/psicologia.svg') }}" alt=""
                                class="my-2 img-fluid border border-2 border-primary rounded-circle"
                                style="width: 250px; height: 250px;">
                        </center>
                        <h1 class="display-4 text-center mb-3 text-shadow-pop-right">
                            Regístrate
                        </h1>
                        <p class="text-body-secondary text-center mb-5">
                        </p>
                    <form method="POST" action="{{ route('security-question.verify') }}">
                     @csrf

                                                        <!-- Email -->
                                                        <div class="form-group">
                                                            <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                                                            <input id="email" type="email" name="email" class="form-control" required autofocus>
                                                            @error('email')
                                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Pregunta de seguridad -->
                                                        <div class="form-group">
                                                            <label for="security_answer" class="form-label">{{ __('Respuesta a la Pregunta de Seguridad') }}</label>
                                                            <input id="security_answer" type="text" name="security_answer" class="form-control" required>
                                                            @error('security_answer')
                                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Nueva Contraseña -->
                                                        <div class="form-group">
                                                            <label for="password" class="form-label">{{ __('Nueva Contraseña') }}</label>
                                                            <input id="password" type="password" name="password" class="form-control" required>
                                                            @error('password')
                                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Confirmar Contraseña -->
                                                        <div class="form-group">
                                                            <label for="password_confirmation" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                                                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                                                            @error('password_confirmation')
                                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Submit -->
                                                        <button type="submit" class="btn btn-lg w-100 btn primary mb-3">
                                                            {{ __('Restablecer Contraseña') }}
                                                        </button>

                                                        <!-- Link -->
                                                        <div class="text-center">
                                                            <small class="text-body-secondary text-center">
                                                                <a href="{{ route('login') }}">{{ __('¿Recordaste tu contraseña?') }}</a>
                                                            </small>
                                                        </div>
                                                    </form>
                            