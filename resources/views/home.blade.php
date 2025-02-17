@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="card-header">
              <h1 class="text-center my-2"><span style="color: yellow;">Registro de persona</span></h1>
            </div>
            <a href="#!" class="btn btn-white ms-10" style="font-size: 18px; padding: 10px 25px; background-color: rgb(255, 255, 255); color: black "
              data-bs-toggle="modal"  data-bs-target="#modalSocio">Agregar</a>
          </div>

          <div class="card-body">
            <div class="row my-3">
              <div class="col-md-6">
                <i class="fa-light fa-star-shooting fa-2xl" style="color: #df1663; vertical-align: 0.8125em;"></i>
                <h2><span style="color: rgb(206, 240, 57)">Registro de Cooperativa </span></h2>
                <p>Utilizamos servidores de alto nivel de seguridad.</p>
              </div>
              <div class="col-md-6">
                <i class="fa-duotone fa-solid fa-shield-halved fa-xl"
                  style="--fa-primary-color: #ffffff; --fa-secondary-color: #8b28cc; vertical-align: 0.8125em;"></i>
                <h2><span style="color: rgb(206, 240, 57)">Privacidad</span></h2>
                <p>Tus datos personales siempre estarán seguros gracias a la encriptación de todas las transferencias.</p>
              </div>
            </div>
            <div class="row my-3">
              <div class="col-md-6">
                <i class="fa-duotone fa-solid fa-lock fa-xl"
                  style="--fa-primary-color: #b647ff; --fa-secondary-color: #eec9cb; vertical-align: 0.8125em;"></i>
                <h2><span style="color: rgb(206, 240, 57)">Estándares</span></h2>
                <p>Utilizamos tecnologías basadas en estándares que se actualizan continuamente con mejoras de seguridad.
                </p>
              </div>
              <div class="col-md-6">
                <i class="fa-duotone fa-solid fa-folder-open fa-2xl"
                  style="--fa-primary-color: #d8e0ee; --fa-secondary-color: #9b9017; vertical-align: 0.8125em;"></i>
                <h2><span style="color: rgb(206, 240, 57)">Atención personalizada</span></h2>
                <p>Ofrecemos atención completamente personalizada para resolver cualquier duda o consulta.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  
@endsection