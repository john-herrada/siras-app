@extends ('layouts.app')
@section('title', 'Vpn-edit')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/vpn-edit.css') }}?v=999">
@endpush
@section('content')
<!--MODAL AGREGAR USUARIO VPN-->
        <div class="modal-content-edit">
            <form action="{{ route('vpn.update', $vpn->Id) }}" class="form-vpn-edit" method="post">
                @csrf
                @method('PUT')
                <div class="head-form-vpn">
                    <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo-ticket" id="logo-vpn">
                    <h2 class="title-form">Agregar Usuario</h2>
                    <br>
                </div>
                <input type="text" name="nombre_usuario" class="input-vpn" value="{{ $vpn->nombre_usuario }}">
                <input type="text" name="puesto" class="input-vpn" value="{{ $vpn->puesto }}">
                <input type="text" name="telefono" class="input-vpn" value="{{ $vpn->telefono }}">
                <input type="text" name="extension" class="input-vpn" value="{{ $vpn->extension }}">
                <input type="text" name="correo" class="input-vpn" value="{{ $vpn->correo }}">
                <input type="text" name="area" class="input-vpn" value="{{ $vpn->area }}">
                <input type="text" name="direccion_ip" class="input-vpn" value="{{ $vpn->direccion_ip }}">
                <input type="text" name="usuario" class="input-vpn" value="{{ $vpn->usuario }}">
                <input type="text" name="clave" class="input-vpn" value="{{ $vpn->clave }}">
                <input type="text" name="jefe_inmediato" class="input-vpn" value="{{ $vpn->jefe_inmediato }}">
                <input type="text" name="cargo" class="input-vpn" value="{{ $vpn->cargo }}">
                <div class="btn-form-content">
                <button type="button" class="btn-vpn cerrar"><a href="{{ route('vpn.index') }}">Cancelar</a></button>
                <button type="submit" class="btn-vpn">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection