@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Publicadores</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
    }

    h1 {
        text-align: center;
        margin: 20px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    </style>
</head>

<body>

    <tbody>
        @foreach($publicador as $profesional)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <div class="d-flex">
                    <img src="{{ asset('assets/img/psicologia.svg') }}" class="rounded-circle me-3" width="80"
                        height="80" alt="Foto">
                    <div>
                        <h5 class="card-title fw-bold">{{ $profesional->user->full_name }}</h5>
                        <p><strong>N° Colegiatura:</strong> {{ $profesional->numero_colegiatura }}</p>
                        <p><strong>Experiencia:</strong> {{ $profesional->experiencia }}</p>
                        <p><strong>Enfermedades tratadas:</strong> {{ $profesional->enfermedades_tratadas }}</p>
                        <p><strong>Formación:</strong> {{ $profesional->formacion }}</p>

                        <p>
                            <a href="{{ $profesional->facebook }}" class="text-primary me-2" target="_blank">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="{{ $profesional->instagram }}" class="text-danger" target="_blank">
                                <i class="bi bi-instagram"></i> Instagram
                            </a>
                            <a href="#!" class="btn btn-lg btn primary"
                                style="background-color: rgb(255, 255, 255);" data-bs-toggle="modal"
                                data-bs-target="#modalReservarCita{{$profesional->id}}">Reservar Cita</a>
                        </p>
                    </div>
                </div>
                <hr>
                <h6 class="fw-bold">Disponibilidad</h6>
                <div class="d-flex flex-wrap">
                    @foreach($profesional->horarios as $horario)
                    <span class="badge btn secondary p-2 me-2 mb-2">
                        {{ ucfirst($horario->dia) }}: {{ $horario->hora }} - {{ $horario->hora_salida }}
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
        @include('psicologos.cita')
        @endforeach
    </tbody>
</body>

</html>


@endsection