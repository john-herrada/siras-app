@extends ('layouts.app')
@section('title', 'Vpn')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/vpn.css') }}?v=999">
@endpush
@section('content')
<div class="screen-vpn">
    <h2 id="titulo">Asignación de VPN a usuarios</h2>
    <div class="users-number">
        <h2>{{ $stats['Registros'] }}</h2>
        <p>Usuarios Asignados</p>
    </div>
    <br>
    <br>
    <button class="btn-vpn abrir">Agregar Nuevo</button>
    <br>
    <br>
    <form method="GET" action="{{ route ('vpn.index') }}" class="form-search">
        <label class="lbl-buscar">
            Buscar Usuario:
            <input type="text" class="input-vpn-search" name="buscar" value="{{ request('buscar') }}">
        </label>
        <button type="submit" class="btn-vpn">Buscar</button>
    </form>
    <br>
    <div class="table-container">
        <table class="table table-striped-columns">
            <tr>
                <th>Id</th>
                <th>Nombre Del Usuario</th>
                <th>Puesto</th>
                <th>Telefono</th>
                <th>Extensión</th>
                <th>Correo Institucional</th>
                <th>Area</th>
                <th>Dirección IP</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Jefe Inmediato</th>
                <th>Cargo</th>
                <th>Fecha de incorporacion</th>
                <th>Acciones</th>
            </tr>
            @foreach($vpns as $vpn)
            <tr>
                <td>{{ $vpn->Id }}</td>
                <td>{{ $vpn->nombre_usuario }}</td>
                <td>{{ $vpn->puesto }}</td>
                <td>{{ $vpn->telefono }}</td>
                <td>{{ $vpn->extension }}</td>
                <td>{{ $vpn->correo }}</td>
                <td>{{ $vpn->area }}</td>
                <td>{{ $vpn->direccion_ip }}</td>
                <td>{{ $vpn->usuario }}</td>
                <td>{{ $vpn->clave }}</td>
                <td>{{ $vpn->jefe_inmediato }}</td>
                <td>{{ $vpn->cargo }}</td>
                <td>{{ $vpn->fecha_incorporacion }}</td>
                <td>
                    <div class="action-content">
                        <button type="button" class="btn-action"><a href="{{ route('vpn.edit', $vpn->Id) }}"><i class="fa-solid fa-pen-to-square" style="color: rgb(255, 255, 255);"></i></a></button>
                        <form action="{{ route('vpn.destroy', $vpn->Id) }}" method="post">
                            @csrf
                            @method ('DELETE')
                            <button type="submit" class="btn-action" onclick="return confirm('¿Deseas borrar el registro?')"><i class="fa-regular fa-trash-can" style="color: rgb(255, 255, 255);"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <!--MODAL AGREGAR USUARIO VPN-->
        <div class="modal-content">
            <form action="{{ route('vpn.store') }}" class="form-vpn" method="post">
                @csrf
                <div class="head-form-vpn">
                    <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo-ticket" class="logo-vpn">
                    <h2 class="title-form">Agregar Usuario</h2>
                    <br>
                </div>
                <input type="text" name="nombre_usuario" class="input-vpn" placeholder="Nombre Completo Del Usuario">
                <input type="text" name="puesto" class="input-vpn" placeholder="Puesto">
                <input type="text" name="telefono" class="input-vpn" placeholder="Telefono">
                <input type="text" name="extension" class="input-vpn" placeholder="Extensión (0 si no utiliza)">
                <input type="text" name="correo" class="input-vpn" placeholder="Correo Institucional">
                <input type="text" name="area" class="input-vpn" placeholder="Area">
                <input type="text" name="direccion_ip" class="input-vpn" placeholder="Dirección IP">
                <input type="text" name="usuario" class="input-vpn" placeholder="Usuario">
                <input type="text" name="clave" class="input-vpn" placeholder="Clave">
                <input type="text" name="jefe_inmediato" class="input-vpn" placeholder="Jefe Inmediato">
                <input type="text" name="cargo" class="input-vpn" placeholder="Cargo">
                <input type="datetime-local" name="fecha_incorporacion" id="fecha-hora" class="input-vpn" readonly>
                <div class="btn-form-content">
                    <button type="button" class="btn-vpn cerrar">Cancelar</button>
                    <button type="submit" class="btn-vpn">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('scripts/vpn.js') }}"></script>
@endpush