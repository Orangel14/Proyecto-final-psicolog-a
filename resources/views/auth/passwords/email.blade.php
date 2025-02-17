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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-1 my-5 align-self-center">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/psicologia.svg') }}" alt="Psicologia" class="my-2 img-fluid border border-2 border-primary rounded-circle" style="width: 200px; height: 200px;">
                        <h1 class="display-4 mb-3 text-shadow-pop-right">Restablecer Contraseña</h1>
                        <p>Ingrese su correo electrónico para recibir el enlace de restablecimiento.</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un enlace de restablecimiento de contraseña a su correo electrónico.') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <p class="text-body-secondary text-center mb-5">
                            <a href="{{ route('security-question.create') }}">Recuperar contraseña por preguntas de seguridad</a>
                          </p>

                        <div class="form-group">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-lg w-100 btn primary mb-3" type="submit">
                            Enviar enlace para restablecer
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
