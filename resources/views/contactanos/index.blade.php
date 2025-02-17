@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg primary text-white">
                    <h2 class="text-shadow-pop-bottom text-center my-2">Contáctanos</h2>
                </div>
                <div class="card-body">
                    <p class="text-center mb-4">Estamos aquí para brindarte apoyo. Si tienes preguntas, comentarios o deseas agendar una sesión, no dudes en comunicarte con nosotros.</p>
                    <hr>
                     <ul class="list-unstyled">
        <li class="text-center mb-3">
        <i class="fa-solid fa-phone-volume fa-2xl text-shadow-pop-bottom" style="color: #BD8670;"></i>
            <span class="ms-2">Teléfono: +1 (555) 123-4567</span>
        </li>
        <li class="text-center mb-3">
            <i class="fa-regular fa-envelope fa-2xl text-shadow-pop-bottom" style="color: #bd8670;"></i>
            <span class="ms-2">Correo: soporte@psicologiavirtual.com</span>
        </li>
        <li class="text-center mb-3">
            <i class="fa-solid fa-earth-oceania fa-2xl text-shadow-pop-bottom" style="color: #bd8670;"></i>
            <span class="ms-2">Ubicación: En línea para tu comodidad</span>
        </li>
    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection