@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">

            <!-- Header -->
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                New project
                            </h6>

                            <!-- Title -->
                            <h1 class="mb-3 text-shadow-pop-right">Informacion</h1>


                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>

            <!-- Form -->

            <form action="{{ route('cita.store') }}" method="POST" class="mb-4">
                @csrf

                <!-- Project name -->
                <div class="form-group">

                </div>

                <!-- Project tags -->
                <div class="form-group">

                    <!-- Label -->
                    <label class="form-label">Plataforma</label>



                    <!-- Select -->
                    <select name="condiciones" class="form-control" data-bs-toggle="select">
                        <option value="Depresión">Whatsapp</option>
                        <option value="Ansiedad">Telegram</option>
                        <option value="Estrés">Meet</option>
                    </select>

                    <div class="row" style="">
                        <div class="col-12 col-md-6">

                            <!-- Phone number -->
                            <div class="form-group">

                                <!-- Label -->
                                <label class="form-label">
                                    Contacto de emergencia
                                </label>

                                <!-- Input -->
                                <input type="tel" class="form-control" name="contacto_emergencia"
                                    value="{{ old('contacto_emergencia', $perfil->contacto_emergencia ?? '') }}"
                                    placeholder="Numero de contacto">

                            </div>

                        </div>




                        <!-- Divider -->
                        <hr class="mt-5 mb-5">

                        <div class="row">
                            <div class="col-12 col-md-6">

                                <!-- Private project -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label mb-1">
                                        Historial Medico
                                    </label>

                                    <!-- Text -->
                                    <small class="form-text text-body-secondary">
                                        Ha tenido un historial medico?
                                    </small>

                                    <!-- Switch -->
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="historial_medico" value="0">
                                        <input class="form-check-input" type="checkbox" id="switchOne"
                                            name="historial_medico" value="1">
                                        <label class="form-check-label" for="switchOne"></label>
                                    </div>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Warning -->
                                <div class="card bg-light border">
                                    <div class="card-body">

                                        <!-- Heading -->
                                        <h4 class="mb-2">
                                            <i class="fe fe-alert-triangle"></i> Tranquilo
                                        </h4>

                                        <!-- Text -->
                                        <p class="small text-body-secondary mb-0">
                                            Toda la informacion es confidencial
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr class="mt-5 mb-5">

                        <!-- Buttons -->
                        <button type="submit" class="btn w-100 btn primary">Actualizar</button>
                        <a href="#" class="btn w-100 btn secondary mt-2">
                            Cancelar
                        </a>

            </form>

        </div>
    </div> <!-- / .row -->
</div>


@endsection

@push('scripts')
<script type="module">
setSelect2();
</script>
@endpush