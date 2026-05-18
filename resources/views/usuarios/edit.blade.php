@extends ('layouts.app')
@section('title', 'Cintas')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/usuarios.css') }}?v={{ time() }}">
@endpush
@section('content')
<!--MODAL PARA FORMULARIO DE EDICIÓN-->
<div class="modal-editusuario">
    <div class="form-editusuario">
        <div class="input-createuser">
            <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo" id="img-form">
            <p class="icono"><i class="fa-solid fa-user" style="color: #fff;"></i></p>
            <h2>Editar Usuario</h2>
        </div>
        <div class="input-createuser">
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="id_usuario" class="input-user" value="{{ $user->id_usuario }}">
                <br>
                @error('id_usuario')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                <br>
                <input type="text" name="nombre_apellido" class="input-user" value="{{ $user->nombre_apellido }}">
                <br>
                @error('nombre_apellido')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                <br>
                <input type="password" name="password" class="input-user" placeholder="Nueva Contraseña">
                <br>
                <select name="roles" class="input-user">

                    <option value="Administrador"
                        {{ optional($user->roles->first())->name == 'Administrador' ? 'selected' : '' }}>
                        Administrador
                    </option>

                    <option value="Estandar"
                        {{ optional($user->roles->first())->name == 'Estandar' ? 'selected' : '' }}>
                        Estandar
                    </option>

                    <option value="Temporal"
                        {{ optional($user->roles->first())->name == 'Temporal' ? 'selected' : '' }}>
                        Temporal
                    </option>

                    <option value="Desarrollador"
                        {{ optional($user->roles->first())->name == 'Desarrollador' ? 'selected' : '' }}>
                        Desarrollador
                    </option>

                </select>
                <br>
                <label class="file-label">Subir Foto</label>
                <input type="file" name="foto" class="input-user file-user">
                <br>
                <a href="{{ route('user.index') }}" class="btn-createusuario">Cancelar</a>
                <button type="submit" class="btn-createusuario">Agregar</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('scripts/usuarios.js') }}?v=123"></script>
@endpush