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
    @guest
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="card-title
                        text-center mb-3 text-shadow-pop-right">Inicia sesión o regístrate</h1>
                        <div class="text-center">
                            <img src="{{ asset('assets/img/psicologia.svg') }}" alt="psicologia" class="my-2 img-fluid border border-2 border-primary rounded-circle" style="width: 300px; height: 300px;">
                            <div class="mt-3">
                                <a href="{{ route('login') }}" class="btn btn secondary">Iniciar</a>
                                <a href="{{ route('register') }}" class="btn btn secondary">Registrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endguest
@endsection
