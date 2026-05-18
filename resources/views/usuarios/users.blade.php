@extends ('layouts.app')
@section('title', 'Usuarios')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/usuarios.css') }}?v=9990">
@endpush
@section('content')
    <div class="screen-usuarios">
        <h2 id="title-usuarios">Administración de Usuarios</h2> 
        <br>
        <br>
        <br>
        @can('createuser')
        <button class="btn-createusuario abrir-modal-user">Agregar usuario</button>
        @endcan
        <br>
        <br>
        <h3 id="title-usuarios">Lista de Usuarios</h3>
        <!--PRESENTACIÓN VISUAL DE CADA USUARIO-->
        
        <div class="user-layout">
            @foreach($users as $user)
            <div class="user-container">
                <div class="user-item">
                    <div class="user-icon" @if(Auth::user()->foto)
                         style="background-image:url('{{ asset(Auth::user()->foto) }}')"
                        @endif>
                        @if(!Auth::user()->foto)
                        <span class="icon-user"><i class="fa-solid fa-user"
                                style="color: rgba(118, 43, 60, 1)"></i></span>
                        @endif
                    </div>
                </div>
                <div class="user-item">
                    <p class="user-item-p"><b>Nombre:</b><span class="user-item-span">{{ $user->nombre_apellido }}</span></p>
                    <p class="user-item-p"><b>Id de Usuario:</b><span class="user-item-span">{{ $user->id_usuario }}</span></p>
                    <p class="user-item-p"><b>Rol:</b><span class="user-item-span">{{ $user->getRoleNames()->first() }}</span></p>
                </div>
                <div class="edit-container">
                     @can('edituser')              
                    <a  href="{{ route('user.edit', $user->id) }}"  class="btn-edituser abrir-modal-useredit"><i class="fa-solid fa-pen-to-square"
                            style="color: rgb(56, 55, 55);"></i></a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                    <button type="submit" class="btn-edituser"><i class="fa-solid fa-trash-can" style="color: rgb(56, 55, 55)"></i></button>
                    </form>
                    @endcan
                </div>
            </div>
        @endforeach
        </div>
    </div>
   
    <!--MODAL PARA FORMULARIO DE CREACIÓN-->
    <div class="modal-createusuario">
        <div class="form-createusuario">
            <div class="input-createuser">
                <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo" id="img-form">
                <p class="icono"><i class="fa-solid fa-user"style="color: #fff;"></i></p>
                <h2>Crear Usuario</h2>
            </div>
            <div class="input-createuser">
                <form action="{{ route('user.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="text" name="id_usuario" class="input-user" placeholder="Id De Usuario">
                    <br>
                    @error('id_usuario')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                    <br>
                    <input type="text" name="nombre_apellido" class="input-user" placeholder="Nombre Y Apellido">
                    <br>
                    @error('nombre_apellido')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                    <br>
                    <input type="password" name="password" class="input-user" value="sener1234" readonly>
                    <br>
                    <span class="aviso-pass">Contraseña provisional: sener1234, cambialo al iniciar sesión</span>
                    <select name="rol" class="input-user">
                        <option value="Administrador">Administrador</option>
                        <option value="Estandar">Estandar</option>
                        <option value="Temporal">Temporal</option>
                        <option value="Desarrollador">Desarrollador</option>
                    </select>
                    <br>
                    <label class="file-label">Subir Foto</label>
                    <input type="file" name="foto" class="input-user file-user">
                    <br>
                    <button type="button" class="btn-createusuario cerrar-modal-user">Cancelar</button>
                    <button type="submit" class="btn-createusuario">Agregar</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@push('scripts')
    <script src="{{ asset('scripts/usuarios.js') }}?v=999"></script>
@endpush
