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
                        <h1 class="mb-3 text-shadow-pop-right">Restablecer Contraseña</h1>
                        <p class="text-muted">Ingrese su nueva contraseña.</p>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group d-none">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <div class="form-group">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button class="btn btn-lg w-100 btn-primary mb-3" type="submit">
                            Restablecer Contraseña
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
