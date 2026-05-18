@extends ('layouts.app')
@section('title', 'Cintas')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/entregas.css') }}?v=123">
@endpush
@section('content')
    <div class="screen-entregas">
        <h2 id="title-entregas">Administración de Entregas </h2>
        <br>
        <br>
        <br>
        <form action="{{ route('entregas.entregar') }}" class="form-entregas" method="post">
            @csrf
        <label class="lb-entrega">Selecciona el prestamo:</label>
        <select name="id_prestamo" id="lista-prestamos">
             @foreach($prestamos as $prestamo)
            <option value="{{ $prestamo->id }}">{{ $prestamo->id }} - {{ $prestamo->codigo_cinta }} - {{ $prestamo->usuario_solicitud }}</option>
             @endforeach
        </select>
        <br>
        <br>
        <button type="submit" class="btn-entrega">Entregar Cinta</button>
        </form>
        <br>
        <br>
        <table class="table table-striped-columns">
            <tr>
                <th>Id de Entrega</th>
                <th>Código de Cinta</th>
                <th>Usuario que Solicito</th>
                <th>Fecha de Prestamo</th>
                <th>Usuario que entrego</th>
                <th>Fecha de entrega</th>
                <th>Estatus</th>
            </tr>
            @foreach($entregas as $entrega)
            <tr>
                <td>{{ $entrega->id }}</td>
                <td>{{ $entrega->codigo_cinta }}</td>
                <td>{{ $entrega->usuario_solicitud }}</td>
                <td>{{ $entrega->fecha_prestamo }}</td>
                <td>{{ $entrega->usuario_entrega }}</td>
                <td>{{ $entrega->fecha_entrega }}</td>
                <td>{{ $entrega->estatus }}</td>
            </tr>
            @endforeach

        </table>
    </div>
@endsection

