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
            <div class="col-12 col-md-8 col-lg-7 col-xl-6 my-5">
                <div class="card">
                    <div class="card-body">

                        <center>
                            <img src="{{ asset('assets/img/psicologia.svg') }}" alt="Gobierno Bolivariano de Venezuela"
                                class="my-2 img-fluid border border-2 border-primary rounded-circle"
                                style="width: 250px; height: 250px;">
                        </center>
                        <h1 class="display-4 text-center mb-3 text-shadow-pop-right">
                            Regístrate
                        </h1>
                        <p class="text-body-secondary text-center mb-5">

                        </p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">
                                    Nombre y Apellido
                                </label>
                                <input type="text" class="form-control" placeholder="Jhon Doe" name="full_name">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Nacionalidad
                                </label>
                                <select class="form-select" data-bs-toggle="select" id="nacionality" name="nacionality">
                                    <option disabled selected value="">Selecciona una Opcion</option>
                                    <option value="V">Venezolano</option>
                                    <option value="E">Extranjero</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    Documento de Identidad
                                </label>
                                <div class="input-group input-group-merge input-group-reverse mb-0">
                                    <input name="dni" id="dni" class="form-control"
                                        placeholder="Documento de Identidad" type="text"
                                        aria-label="Documento de Identidad" aria-describedby="nacionality" maxlength="9"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')"
                                        readonly>
                                    <div class="input-group-text text-dark">
                                        <span id="letter-nacionality">-</span>
                                    </div>
                                </div>
                            </div>
                                                     

                              <div class="form-group">
                                <label class="form-label">
                                   Seleciona si eres Especialista o Paciente
                                </label>
                                <select class="form-control" data-bs-toggle="select" name="role" id="role">
                                    <option value="publicador">Psicologo</option>
                                    <option value="user">Paciente</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Fecha de Nacimiento
                                </label>
                                <input type="date" class="form-control" name="date_of_birth" data-flatpickr>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Dirección
                                </label>
                                <textarea class="form-control" name="address" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Biografía
                                </label>
                                <textarea class="form-control" name="biography" rows="3"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    Correo Electrónico
                                </label>
                                <input type="email" class="form-control" placeholder="jhondoe@correo.com" name="email">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Confirmar Correo Electrónico
                                </label>
                                <input type="email" class="form-control" placeholder="jhondoe@correo.com" name="email_confirmation">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Contraseña
                                </label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" placeholder="Ingresa una Contraseña" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula, un caracter especial y al menos 8 o más caracteres">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Confirmar Contraseña
                                </label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" placeholder="Confirmar la Contraseña" name="password_confirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula, un caracter especial y al menos 8 o más caracteres">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Pregunta de Seguridad</label>
                                <div>
                                <select id="security_question" class="form-control @error('security_question') is-invalid @enderror"
                                    name="security_question" value="{{ old('security_question') }}">
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="color">¿Cuál es tu color favorito?</option>
                                    <option value="mascota">¿Cuál es el nombre de tu mascota?</option>
                                    <option value="lugar">¿Cuál es tu lugar de nacimiento?</option>
                                </select>
                                @error('security_question')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Respuesta de Seguridad</label>
                                <input id="security_answer" type="text" class="form-control @error('security_answer') is-invalid @enderror"
                                name="security_answer" value="{{ old('security_answer') }}" autocomplete="security_answer">
                                @error('security_answer')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="btn btn-lg w-100 btn primary mb-3">
                                Registrarte
                            </button>

                            <div class="text-center">
                                <div class="col-auto text-center">
                                    ¿Ya te registraste? <a href="{{ route('login') }}">Ingresa aqui</a>.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            //on change
            $("#nacionality").change(function() {
                let letter = $(this).val();
                $("#letter-nacionality").html(letter);
                $("#dni").removeAttr('readonly');
                $('#dni').change()
            });
        });
    </script>
@endpush
