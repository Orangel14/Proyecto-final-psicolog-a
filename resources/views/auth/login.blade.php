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
<div class="container-fluid mt-md-5 pt-md-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-5 col-xl-4 px-lg-1 my-5 align-self-center">
      <div class="card">
        <div class="card-body">
          <div class="text-center">
            <img src="{{ asset('assets/img/psicologia.svg') }}" alt="psicologia" class="my-2 img-fluid border border-2 border-primary rounded-circle" style="width: 300px; height: 300px;">
            <h1 class="display-4 mb-1 mb-3 text-shadow-pop-right">Bienvenido</h1>
            <p>Inicia sesión para continuar.</p>
          </div>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label class="form-label">
                Email
              </label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col">
                  <label class="form-label">
                    Contraseña
                  </label>
                </div>
                <div class="col-auto">
                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" >¿Olvidaste tu contraseña?</a>
                  @endif
                </div>
              </div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <button class="btn btn-lg w-100 btn primary mb-3" type="submit">
              Iniciar sesión
            </button>
           
            @if (Route::has('password.request'))
            @endif
    
            <hr class="my-4">
            <div class="text-center">
                <div class="col-auto text-center">
                ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
