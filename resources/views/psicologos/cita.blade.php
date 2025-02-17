
<div class="modal fade" id="modalReservarCita{{$profesional->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title mb-3 text-shadow-pop-right" id="modalLabel">Reservar Cita con <span id="psicologoNombre">{{$profesional->user->full_name }}</span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formReservarCita" action="{{ route('publicador.createCita') }}" method="POST">
                   
                    @csrf
                    <input type="hidden" value="{{$profesional->id}}" id="publicador_id" name="publicador_id">
                    <input type="hidden" value="{{auth()->user()->id}}" id="user_id" name="user_id">
                    

                    <div class="mb-3">
                        <label for="horario" class="form-label">Horario</label>
                        <select class="form-control" id="horario" name="horario" required>
                            @foreach($profesional->horarios as $horario)
                            <option value="{{ $horario->id }}">
                                {{ ucfirst($horario->dia) }}: {{ $horario->hora }} - {{ $horario->hora_salida }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo</label>
                        <textarea class="form-control" id="motivo" name="motivo" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="plataforma" class="form-label">Plataforma</label>
                        <select class="form-control" id="plataforma" name="plataforma" required>
                            <option value="ws">Whatsapp</option>
                            <option value="discord">Discord</option>
                            <option value="zoom">Zoom</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-lg btn primary">Confirmar Reserva</button>
                </form>
            </div>
        </div>
    </div>
</div>