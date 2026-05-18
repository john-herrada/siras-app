@extends ('layouts.app')
@section('title', 'tickets')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/tickets.css') }}?v={{ time() }}">
@endpush
@section('content')
<div class="screen-tickets">
    <h2 class="title-ticket">Seguimiento de Tickets</h2>
    <br>
    <br>
    <div class="btn-tickets-container">
        <button class="btn-create-ticket" type="button">Crear Seguimiento</button>
    </div>
    <h3 class="title-ticket">Tickets Asignados A Mi</h3>
    <br>
    @foreach($tickets as $ticket1)
    <div class="table-container-assign">
        <table class="table">
            <tr>
                <th>Ticket De Referencia</th>
                <th colspan="2">Creado Por</th>
                <th>Fecha De Creación</th>
            </tr>
            <tr>
                <td>{{ $ticket1->ticket_referencia }}</td>
                <td colspan="2">{{ $ticket1->creado_por }}</td>
                <td>{{ $ticket1->fecha_creacion }}</td>
            </tr>
            <tr>
                <th>Nombre del Usuario</th>
                <th>Piso</th>
                <th>Ala</th>
                <th>Ubicacion Del Usuario</th>
            </tr>
            <tr>
                <td>{{ $ticket1->nombre_usuario }}</td>
                <td>{{ $ticket1->piso }}</td>
                <td>{{ $ticket1->ala }}</td>
                <td>{{ $ticket1->referencia_ubicacion }}</td>
            </tr>
            <tr>
                <th colspan="4">Falla</th>
            </tr>
            <tr>
                <td colspan="4">{{ $ticket1->detalles }}</td>
            </tr>
            <tr>
                <th colspan="2">Ingeniero Asignado</th>
                <th colspan="2">Estatus</th>
            </tr>
            <tr>
                <td colspan="2">{{ $ticket1->seguido_por }}</td>
                <td colspan="2">{{ $ticket1->estatus }}</td>
            </tr>
        </table>
    </div>
    <div class="container-edit-button">
        @if($ticket1->estatus != 'Completado')
        <button class="btn-action-ticket open-edit-modal" type="button"><i class="fa-solid fa-check"></i></button>
        @endif
        <form action="{{ route('tickets.destroy', $ticket1->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn-action-ticket" type="submit"><i class="fa-regular fa-trash-can""></i></button>
            </form>
        </div>
     <!--MODAL CERRAR TICKET-->
    <div class="modal-content-edit">
        <form action="{{ route('tickets.update', $ticket1->id) }}" class="form-ticket" method="post">
            @csrf
            @method('PUT')
            <div class="head-form">
                <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo-ticket" id="logo-ticket">
                <h2 class="title-form">Cerrar Ticket</h2>
            </div>
            <input type="datetime-local" name="fecha_cierre" class="input-ticket" id="fechahora2" readonly>
            <textarea name="observaciones_finales" class="obser-form">Observaciones Finales</textarea>
            <br>
            <div class="btn-content-form">
                <button type="button" class="btn-form-ticket close-edit-modal"><a href="">Cancelar</a></button>
                <button type="submit" class="btn-form-ticket">Cerrar Ticket</button>
            </div>
        </form>
    </div>
    @endforeach
    <h3 class=" title-ticket">Historial De Tickets</h3>
                    <br>
                    <div class="table-container">
                        <table class="table table-striped-columns">
                            <tr>
                                <th>Folio</th>
                                <th>Ticket De Referencia</th>
                                <th>Creado Por</th>
                                <th>Fecha De Creación</th>
                                <th>Nombre del Usuario</th>
                                <th>Falla</th>
                                <th>Piso</th>
                                <th>Ala</th>
                                <th>Ubicacion Del Usuario</th>
                                <th>Ingeniero Asignado</th>
                                <th>Fecha Cierre</th>
                                <th>Estatus</th>
                                <th>Observaciones Finales</th>
                            </tr>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->ticket_referencia }}</td>
                                <td>{{ $ticket->creado_por }}</td>
                                <td>{{ $ticket->fecha_creacion }}</td>
                                <td>{{ $ticket->nombre_usuario }}</td>
                                <td>{{ $ticket->detalles }}</td>
                                <td>{{ $ticket->piso }}</td>
                                <td>{{ $ticket->ala }}</td>
                                <td>{{ $ticket->referencia_ubicacion }}</td>
                                <td>{{ $ticket->seguido_por }}</td>
                                <td>{{ $ticket->fecha_cierre }}</td>
                                <td>{{ $ticket->estatus }}</td>
                                <td>{{ $ticket->observaciones_finales }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!--MODAL PARA AGREGAR TICKET-->
                    <div class="modal-content">
                        <form action="{{ route('tickets.store') }}" class="form-ticket" method="post">
                            @csrf
                            <div class="head-form">

                                <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo-ticket" id="logo-ticket">
                                <h2 class="title-form">Crear Ticket</h2>
                            </div>
                            <input type="text" name="ticket_referencia" placeholder="Ticket de referencia" class="input-ticket">
                            <input type="text" name="creado_por" value="{{ auth()->user()->nombre_apellido }}" class="input-ticket" readonly>
                            <input type="datetime-local" name="fecha_creacion" class="input-ticket" id="fechahora1" readonly>
                            <input type="text" name="nombre_usuario" placeholder="Nombre Del Usuario" class="input-ticket">
                            <textarea name="detalles" id="text-falla">Describe La Falla</textarea>
                            <input type="text" name="piso" placeholder="Piso" class="input-ticket">
                            <input type="text" name="ala" placeholder="Ala" class="input-ticket">
                            <input type="text" name="referencia_ubicacion" placeholder="Ubicacion del Usuario" class="input-ticket">
                            <select name="id_usuario" id="user-list" class="input-ticket">
                                <option value="" disabled selected>Ingeniero Asignado</option>
                                @foreach($userslist as $user)
                                <option value="{{ $user->nombre_apellido }}">{{ $user->nombre_apellido }}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="btn-content-form">
                                <button type="button" class="btn-form-ticket btn-create-ticket-close">Cancelar</button>
                                <button type="submit" class="btn-form-ticket">Crear Ticket</button>
                            </div>
                        </form>
                    </div>

    </div>
    @endsection
    @push('scripts')
    <script src="{{ asset ('scripts/tickets.js') }}"></script>
@endpush