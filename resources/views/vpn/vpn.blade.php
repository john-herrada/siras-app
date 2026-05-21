@extends ('layouts.app')
@section('title', 'Vpn')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/vpn.css') }}?v=999">
@endpush
@section('content')
<div class="screen-vpn">
    <h2 id="titulo">Asignación de VPN a usuarios</h2>
    <div class="users-number">
        <h2>00</h2>
        <p>Usuarios Asignados</p>
    </div>
    <br>
    <br>
    <button class="btn-vpn abrir">Agregar Nuevo</button>
    <br>
    <br>
    <form method="GET" action="">
        <label class="lbl-buscar">
             Buscar Usuario:
        <input type="text" class="input-vpn-search" name="buscar" value="">
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="action-content">
                        <button type="button" class="btn-action"><a href=""><i class="fa-solid fa-pen-to-square"  style="color: rgb(255, 255, 255);"></i></a></button>
                        <form action="">
                            <button type="submit" class="btn-action"><i class="fa-regular fa-trash-can" style="color: rgb(255, 255, 255);"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
<!--MODAL AGREGAR USUARIO VPN-->
        <div class="modal-content">
            <form action="" class="form-vpn">
                <div class="head-form-vpn">
                    <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo-ticket" id="logo-vpn">
                    <h2 class="title-form">Agregar Usuario</h2>
                    <br>
                </div>
                <input type="text" name="" class="input-vpn" placeholder="Nombre Completo Del Usuario">
                <input type="text" name="" class="input-vpn" placeholder="Puesto">
                <input type="text" name="" class="input-vpn" placeholder="Telefono">
                <input type="text" name="" class="input-vpn" placeholder="Extensión">
                <input type="text" name="" class="input-vpn" placeholder="Correo Institucional">
                <input type="text" name="" class="input-vpn" placeholder="Area">
                <input type="text" name="" class="input-vpn" placeholder="Dirección IP">
                <input type="text" name="" class="input-vpn" placeholder="Usuario">
                <input type="text" name="" class="input-vpn" placeholder="Clave">
                <input type="text" name="" class="input-vpn" placeholder="Jefe Inmediato">
                <input type="text" name="" class="input-vpn" placeholder="Cargo">
                <input type="datetime-local" name="" id="fecha-hora" class="input-vpn" readonly>
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
