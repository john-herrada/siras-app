@extends ('layouts.app')
@section('title', 'Mensajes')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/reportes.css') }}?v={{ time() }}">
@endpush
@section('content')
<div class="screen-reports">
    <h2 class="title-reports">Descargar Concentrado De Tablas</h2>
    <div class="btn-container">
        <button class="btn-reports"><a href="{{ route('export.usuarios') }}">Usuarios</a></button>
        <button class="btn-reports"><a href="{{ route('export.cintas') }}">Cintas</a></button>
        <button class="btn-reports"><a href="{{ route('export.prestamos') }}">Prestamos Vigentes</a></button>
        <button class="btn-reports"><a href="{{ route('export.entregas') }}">Cintas Entregadas</a></button>
        <button class="btn-reports"><a href="">Cintas De Limpieza</a></button>

    </div>
    <div class="form-container">
        <h2 class="title-reports">Carga De Archivos</h2>
        <form action="{{ route('files.store') }}" method="post" class="form-report" enctype="multipart/form-data">
            @csrf
            <select name="id_usuario" id="user-list" class="file-report">
                <option value="" disabled selected>Usuario al que se envia</option>
                @foreach($users as $user)
                <option value="{{ $user->id_usuario }}">{{ $user->nombre_apellido }}</option>
                @endforeach
            </select>
            <input type="file" name="file_document" class="file-report">
            <button type="submit" class="btn-reports">Enviar</button>
        </form>
        <table class="table table-striped-columns">
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        @foreach($files as $file)
        <tr>
            <td>{{ $file->file_name }}</td>
            <td>
                <div class="btn-file-container">
                    <a href="{{ asset($file->file_path) }}"
                        class="btn-file"
                        download>
                        <i class="fa-solid fa-download"></i>
                    </a>
                    <form action="{{ route('files.destroy', $file->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-file">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection