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
            <div class="col-12 col-md-5 col-xl-5 text-center mb-5">
                <img src="{{ asset('assets/img/psicologia.svg') }}" alt="Gobierno Bolivariano de Venezuela" class="my-2 img-fluid border border-2 border-primary rounded-circle" style="width: 200px; height: 200px;">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifique su dirección de correo electrónico') }}</div>
                    <div class="card-body">
                        
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                            </div>
                        @endif
                        <p style="text-align: justify">
                            Estimado/a, <strong>{{ Auth::user()->full_name }}</strong>!, te hemos enviado un correo electrónico a <strong>{{ Auth::user()->email }}</strong>. 
                            Por favor, haga clic en el enlace de verificación en el correo electrónico para verificar su dirección de correo electrónico.
                            <br>
                            <br>
                            Antes de continuar, compruebe su correo electrónico para ver si hay un enlace de verificación. Si no recibió el correo electrónico,
                        </p>
                        <br>
                        Si no recibió el correo electrónico,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                {{ __('haga clic aquí para solicitar otro') }}
                            </button>.
                        </form>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-12 mb-5">
                                <center>
                                    <br>
                                    <p style="text-align: center;">
                                        ¿Necesitas ayuda? Estamos aquí para ayudarte. Por favor llámanos al <a
                                            href="tel:0212-000-0000">0212-000-0000</a>
                                    </p>
                                    <br>
                                </center>
                                <center>
                                    <p>
                                        ¿Quieres cerrar sesión? <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                    </p>
                                </center>
                                <br>
                                <center>
                                    <p>
                                        <small class="text-muted">Psicologia Virtual</small>
                                    </p>
                                </center>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
