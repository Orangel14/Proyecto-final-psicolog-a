@extends('layouts.app')

@section('content')

<div class="container-lg">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">

        <!-- Form -->
        <form class="tab-content py-6" id="wizardSteps" action="{{ route('psicologos.store') }}" method="POST">
          @csrf
          <div class="tab-pane fade show active" id="wizardStepOne" role="tabpanel" aria-labelledby="wizardTabOne">

            <!-- Header -->
            <div class="row justify-content-center">
              <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                <!-- Pretitle -->
                <h6 class="mb-4 text-uppercase text-body-secondary">
                  Pagina 1 de 3
                </h6>

                <!-- Title -->
                <h1 class="mb-3 text-shadow-pop-right">Empecemos con lo básico.</h1>



                <!-- Subtitle -->
                <p class="mb-5 text-body-secondary">
                  Tomate tu tiempo para completar la información, esto ayudará a los demás a conocerte mejor.
                </p>

              </div>
            </div> <!-- / .row -->

           <!-- Team name -->
           <div class="col-12 col-md-6" style="margin-left: 25%;">
  
            <!-- Label -->
            <label class="form-label">
              Número de Colegiatura
            </label>

            <!-- Input -->
            <input type="text" name="numero_colegiatura" class="form-control" placeholder="########">

          </div>

            <!-- Team description -->
            <div class="form-group">

              <!-- Label -->
              <label class="form-label mb-1">Especialidades
              </label>

              <!-- Text -->
              <small class="form-text text-body-secondary">
                Describe tus especialidades.
              </small>

             
                 <!-- Quill -->
           
              <textarea name="enfermedades_tratadas" id="enfermedades_tratadas" cols="80" rows="5"></textarea>
                   
            </div> <!-- / .row -->
            <div class="row">
                <div class="col-12 col-md-6">
  
                  <!-- Start date -->
                  <div class="form-group">
  
                    <!-- Label -->
                    <label class="form-label">
                     Facebook
                    </label>
  
                    <!-- Input -->
                    <input type="text" name="facebook" class="form-control">
  
                  </div>
  
                </div>
                <div class="col-12 col-md-6">
  
                  <!-- Start date -->
                  <div class="form-group">
  
                    <!-- Label -->
                    <label class="form-label">
                        Instagram
                    </label>
  
                    <!-- Input -->
                    <input type="text" name="instagram" class="form-control">
  
                  </div>
  
                </div>
            </div> <!-- / .row -->

            <!-- Divider -->
            <hr class="my-5">

            <!-- Footer -->
            <div class="nav row align-items-center">
              <div class="col-auto">

                <!-- Button -->
                <button class="btn btn-lg btn secondary" type="reset">Cancelar</button>

              </div>
              <div class="col text-center">

                <!-- Step -->
                <h6 class="text-uppercase text-body-secondary mb-0">Pagina 1 de 3</h6>

              </div>
              <div class="col-auto">

                <!-- Button -->
                <a class="btn btn-lg btn primary" data-toggle="wizard" href="#wizardStepTwo">Continuar</a>

              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="wizardStepTwo" role="tabpanel" aria-labelledby="wizardTabTwo">

            <!-- Header -->
            <div class="row justify-content-center">
              <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                

                <!-- Title -->
               
                <!-- Pretitle -->
                <h6 class="mb-4 text-uppercase text-body-secondary">
                    Pagina 2 de 3
                  </h6>
  
                  <!-- Title -->
                  <h1 class="mb-3 text-shadow-pop-right">
                      Explica un poco tu experiencia
                  </h1>
  
                  <!-- Subtitle -->
                  <p class="mb-5 text-body-secondary">
                    Tomate tu tiempo para completar la información, esto ayudará a los demás a conocerte mejor.
                  </p>
  
                </div>
              </div> <!-- / .row -->
  
              <!-- Team name -->
              <div class="col-12 col-md-6" style="margin-left: 25%;">
  
                <!-- Label -->
                <label class="form-label">
                  Formacion
                </label>
  
                <!-- Input -->
                <input type="text"  name="formacion" class="form-control" placeholder="Instituto Universitario">
  
              </div>
  
              <!-- Team description -->
              <div class="form-group">
  
                <!-- Label -->
                <label class="form-label mb-1">
                  Experiencia
                </label>
  
                <!-- Text -->
                <small class="form-text text-body-secondary">
                  Describe detalladamente tu experiencia.
                </small>
  
                 <!-- Quill -->
                 <!-- Quill -->
                 <textarea name="experiencia" id="experiencia" cols="80" rows="5"></textarea>
                 


              

                
  
                     
             
              </div> <!-- / .row -->

            <!-- Divider -->
            <hr class="my-5">

            <!-- Footer -->
            <div class="nav row align-items-center">
              <div class="col-auto">

                <!-- Button -->
                <a class="btn btn-lg btn secondary" data-toggle="wizard" href="#wizardStepOne">Atras</a>

              </div>
              <div class="col text-center">

                <!-- Step -->
                <h6 class="text-uppercase text-body-secondary mb-0">Paso 2 de 3</h6>

              </div>
              <div class="col-auto">

                <!-- Button -->
                <a class="btn btn-lg btn primary" data-toggle="wizard" href="#wizardStepThree">Continuar</a>

              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="wizardStepThree" role="tabpanel" aria-labelledby="wizardTabThree">

            <!-- Header -->
            <div class="row justify-content-center">
              <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                <!-- Pretitle -->
                <h6 class="mb-4 text-uppercase text-body-secondary">
                  Pagina 3 de 3
                </h6>

                <!-- Title -->
                <h1 class="mb-3 text-shadow-pop-right">
                  Ultimo Paso
                </h1>

                <!-- Subtitle -->
                <p class="mb-5 text-body-secondary">
                  informacion de horario
                </p>

              </div>
            </div> <!-- / .row -->

            <div class="card shadow">
              <div class="card-header boder-0">
                <div class="row aling-items-center">
                  <div class="col">
                    <h3 class="mb-0">Horario de Atencion</h3>
                  </div>
                  {{-- <div class="col text-right">
                    <button class="btn btn-sm btn-primary" type="button">Agregar Horario</button>
                   </div> --}}
                </div>
              </div>
            </div>
            <div class="card-body">
              @If (session('notification'))
              <div class="alert alert-success" role="alert">
                {{ session('notification') }}
            </div>
            @endif
            <div class="table-responsive">
              
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th>Dia</th>
                    <th>Acciones</th>
                    <th>hora</th>
                    <th>hasta</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dias as $dia)
                  <tr>
                    <th>
                      {{ $dia }}
                    </th>
                    <td>
                      <label class="custom-toggle">
                        <input type="checkbox"  name="dia[{{$dia}}]" value="{{ $dia }}"
                        id="dia_{{ $dia }}" >
                        <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                          <select name="hora[{{$dia}}]"  class="form-control">
                          @for ($i = 9; $i <= 11; $i++)
                            <option value="{{ $i }}:00">{{ $i }}:00 AM</option>
                            <option value="{{ $i }}:30">{{ $i }}:30 AM</option>
                          @endfor
                          </select>
                        </div>
                        <td>
                          <select name="hora_salida[{{$dia}}]"  class="form-control">
                            @for ($i = 1; $i <= 11; $i++)
                              <option value="{{ $i }}:00">{{ $i }}:00 PM</option>
                              <option value="{{ $i }}:30">{{ $i }}:30 PM </option>
                           @endfor
                          </select>
                        </td>
                      </div>
                    </td>
                  </tr>
                  @endforeach

                </tbody>

               
              </table>

            </div>         
                       

            <!-- Divider -->
            <hr class="mt-5 mb-5">

            <div class="row">
              <div class="col-12 col-md-6">

                <!-- Private project -->
                <div class="form-group">

                  <!-- Label -->
                  <label class="form-label mb-1">
                    Terminos y Condiciones
                  </label>

                  <textarea name="termino" id="termino" cols="40" rows="8"></textarea>               

                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- Warning -->
                <div class="card bg-light border">
                  <div class="card-body">

                    <!-- Heading -->
                    <h4 class="mb-2">
                      <i class="fe fe-alert-triangle"></i> Cuidado
                    </h4>

                    <!-- Text -->
                    <p class="small text-body-secondary mb-0">
                      Asegurate de que los horarios sean correctos.
                      y pongas los terminos y condiciones
                    </p>

                  </div>
                </div>

              </div>
            </div> <!-- / .row -->

            <!-- Divider -->
            <hr class="my-5">

            <!-- Footer -->
            <div class="nav row align-items-center">
              <div class="col-auto">

                <!-- Button -->
                <a class="btn btn-lg btn secondary" data-toggle="wizard" href="#wizardStepTwo">Atras</a>

              </div>
              <div class="col text-center">

                <!-- Step -->
                <h6 class="text-uppercase text-body-secondary mb-0">Paso 3 de 3</h6>

              </div>
              <div class="col-auto">

                <!-- Button -->
                <button class="btn btn-lg btn primary" type="submit">Crear</button>

              </div>
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>



@endsection

@push('scripts')
    <script type="module">
     $(document).ready(function () {
            // Espera un momento para que Quill sea inicializado automáticamente
            setTimeout(function() {
                var quill = Quill.find(document.getElementById("cajatexto")); // Obtiene la instancia de Quill

                if (!quill) {
                    console.error("No se encontró la instancia de Quill en #cajatexto");
                    return;
                }

                // Captura el evento submit con jQuery
                $("#wizardSteps").on("submit", function () {
                    var htmlContent = quill.root.innerHTML; // Obtiene el contenido en HTML
                    $("#quillContent").val(htmlContent); // Guarda el contenido en el input oculto
                });
            }, 500); // Pequeña espera para asegurar que Quill esté inicializado
        });
    </script>

<script type="module">
  $(document).ready(function () {
         // Espera un momento para que Quill sea inicializado automáticamente
         setTimeout(function() {
             var quill = Quill.find(document.getElementById("caja")); // Obtiene la instancia de Quill

             if (!quill) {
                 console.error("No se encontró la instancia de Quill en #caja");
                 return;
             }

             // Captura el evento submit con jQuery
             $("#wizardSteps").on("submit", function () {
                 var htmlContent = quill.root.innerHTML; // Obtiene el contenido en HTML
                 $("#quillContentaqui").val(htmlContent); // Guarda el contenido en el input oculto
             });
         }, 500); // Pequeña espera para asegurar que Quill esté inicializado
     });
 </script>
@endpush
