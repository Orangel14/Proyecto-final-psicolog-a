@extends('layouts.app')

@push('class-body')
d-block align-items-center bg-auth border-top border-top-2 border-primary 
@endpush

@push('styles')
<style>
  body {
    background-image: url('{{ asset('assets/img/pasaportes.jpg') }}');
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
                        <img src="{{ asset('assets/img/logo_user.jpg') }}" alt="Gobierno Bolivariano de Venezuela" class="my-2 img-fluid border border-2 border-primary rounded-circle" style="width: 200px; height: 200px;">
                        <h1 class="display-4 mb-1">Confirmar Contraseña</h1>
                        <p class="text-muted">Por favor, confirme su contraseña antes de continuar.</p>
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-3">
                                Confirmar Contraseña
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
