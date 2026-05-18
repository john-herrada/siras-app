@extends ('layouts.app')
@section('title', 'Cintas')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/prestamos.css') }}?v=123">
@endpush
@section('content')
    <div class="screen-prestamos">
        <h2 id="title-prestamos">Administración de Prestamos</h2>
        <br>
        <br>
        <br>
        <button class="btn-createprestamo abrir-modal-prestamo">Agregar prestamo</button>
        <br>
        <br>
        <div>
        <table class="table table-striped-columns">
            <tr>
                <th>Id de Prestamo</th>
                <th>Código de Cinta</th>
                <th>Usuario que Solicita</th>
                <th>Fecha de Prestamo</th>
            </tr>
            @foreach($prestamos as $prestamo)
            <tr>
                <td>{{ $prestamo->id }}</td>
                <td>{{ $prestamo->codigo_cinta }}</td>
                <td>{{ $prestamo->usuario_solicitud }}</td>
                <td>{{ $prestamo->fecha_prestamo }}</td>
            </tr>
            @endforeach
        </table>
        </div>
         <!--MODAL PARA FORMULARIO DE CREACIÓN-->
        <div class="modal-createprestamo">
            <div class="form-createprestamo">
                <div class="input-create">
                    <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo" id="img-form">
                    <p class="icono"><i class="fa-solid fa-building-circle-check"></i></p>
                    <h2>Crear Prestamo</h2>
                </div>
                <div class="input-create">
                    <form action="{{ route('prestamo.store') }}" method="post">
                        @csrf
                        <input type="text" name="codigo_cinta" class="input-cintas" placeholder="Código De Cinta">
                        <br>
                        @error('codigo_cinta')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="usuario_solicitud" class="input-cintas" value="{{ auth()->user()->nombre_apellido }}" readonly>
                        <br>
                        <input type="datetime-local" id="fechaHora" class="input-cintas" name="fecha_prestamo" readonly>
                        <br> 
                        <br>
                        <button type="button" class="btn-createprestamo cerrar-modal-prestamo">Cancelar</button>
                        <button type="submit" class="btn-createprestamo">Agregar</button>
                    </form>
                    
                </div>
            </div>
      </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset ('scripts/prestamos.js') }}?v=2"></script>
@endpush