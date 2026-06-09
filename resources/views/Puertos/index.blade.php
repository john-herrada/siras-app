@extends ('layouts.app')
@section('title', 'Puertos')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/puertos.css') }}?v=999">
@endpush
@section('content')
<div class="screen-ports">
  <h2 class="title">Ubicación De Puertos del SITE</h2>
  <div class="row-container">
    <div class="row-item">
      <fieldset class="box-row">
        <legend class="title-row">Fila 0</legend>
        <button class="btn-port"><a href="{{ route('f0r1') }}">Rack 1</a></button>
      </fieldset>
    </div>
    <div class="row-item">
      <fieldset class="box-row">
        <legend class="title-row">Fila 1</legend>
        <button class="btn-port"><a href="{{ route('f1r1') }}">Rack 1</a></button>
        <button class="btn-port"><a href="{{ route('f1r2') }}">Rack 2</a></button>
        <button class="btn-port"><a href="{{ route('f1r3') }}">Rack 3</a></button>
        <button class="btn-port"><a href="{{ route('f1r4') }}">Rack 4</a></button>
        <button class="btn-port"><a href="{{ route('f1r5') }}">Rack 5</a></button>
        <button class="btn-port"><a href="{{ route('f1r6') }}">Rack 6</a></button>
      </fieldset>
    </div>
    <div class="row-item">
      <fieldset class="box-row">
        <legend class="title-row">Fila 2</legend>
        <button class="btn-port"><a href="{{ route('f2r1') }}">Rack 1</a></button>
        <button class="btn-port"><a href="{{ route('f2r2') }}">Rack 2</a></button>
        <button class="btn-port"><a href="{{ route('f2r3') }}">Rack 3</a></button>
        <button class="btn-port"><a href="{{ route('f2r4') }}">Rack 4</a></button>
        <button class="btn-port"><a href="{{ route('f2r6') }}">Rack 6</a></button>
        <button class="btn-port"><a href="{{ route('f2r7') }}">Rack 7</a></button>
      </fieldset>
    </div>
    <div class="row-item">
      <fieldset class="box-row">
        <legend class="title-row">Fila 3</legend>
        <button class="btn-port"><a href="{{ route('f3r1') }}">Rack 1</a></button>
        <button class="btn-port"><a href="{{ route('f3r2') }}">Rack 2</a></button>
        <button class="btn-port"><a href="{{ route('f3r3') }}">Rack 3</a></button>
        <button class="btn-port"><a href="{{ route('f3r4') }}">Rack 4</a></button>
        <button class="btn-port"><a href="{{ route('f3r5') }}">Rack 5</a></button>
        <button class="btn-port"><a href="{{ route('f3r6') }}">Rack 6</a></button>
        <button class="btn-port"><a href="{{ route('f3r8') }}">Rack 8</a></button>
      </fieldset>
    </div>
    <div class="row-item">
      <fieldset class="box-row">
        <legend class="title-row">Fila 4</legend>
        <button class="btn-port"><a href="{{ route('f4r1') }}">Rack 1</a></button>
        <button class="btn-port"><a href="{{ route('f4r2') }}">Rack 2</a></button>
        <button class="btn-port"><a href="{{ route('f4r3') }}">Rack 3</a></button>
        <button class="btn-port"><a href="{{ route('f4r4') }}">Rack 4</a></button>
        <button class="btn-port"><a href="{{ route('f4r6') }}">Rack 6</a></button>
        <button class="btn-port"><a href="{{ route('f4r7') }}">Rack 7</a></button>
        <button class="btn-port"><a href="{{ route('f4r8') }}">Rack 8</a></button>
      </fieldset>
    </div>
    <div class="row-item">
      <fieldset class="box-row">
        <legend class="title-row">Fila 5</legend>
        <button class="btn-port" disabled><a href="">Rack 1</a></button>
        <button class="btn-port" disabled><a href="">Rack 2</a></button>
        <button class="btn-port" disabled><a href="">Rack 3</a></button>
        <button class="btn-port" disabled><a href="">Rack 4</a></button>
        <button class="btn-port" disabled><a href="">Rack 5</a></button>
        <button class="btn-port" disabled><a href="">Rack 6</a></button>
        <button class="btn-port" disabled><a href="">Rack 7</a></button>
        <button class="btn-port" disabled><a href="">Rack 8</a></button>
      </fieldset>
    </div>
  </div>
    <br>
    <button class="btn-modal abrir">Agregar nuevo nodo</button>
    <br>
    <br>
    <br>
    <form method="GET" action="{{ route('puertos.index') }}">
    <label class="lbl-buscar">
        Buscar Registro:
        <input
            type="text"
            class="buscar"
            name="buscar"
            value="{{ request('buscar') }}">
    </label>

    <button type="submit" class="btn-buscar">
        Buscar
    </button>
</form>
    <br>
    <br>
    <div class="port-data-container">
      <table class="table table-striped-columns">
        <tr>
          <th>Id HTML</th>
          <th>Equipo</th>
          <th>Serie</th>
          <th>Fila</th>
          <th>Rack</th>
          <th>Unidad</th>
          <th>Puerto de origen</th>
          <th>Puerto de destino</th>
          <th>Fila de destino</th>
          <th>Rack de destino</th>
          <th>Unidad de destino</th>
          <th>Equipo de destino</th>
          <th>Serie de destino</th>
          <th>Acciones</th>
        </tr>
        @foreach ($puertos as $puerto)
        <tr>
          <td>{{ $puerto->id_html }}</td>
          <td>{{ $puerto->nombre_equipo }}</td>
          <td>{{ $puerto->serie }}</td>
          <td>{{ $puerto->fila }}</td>
          <td>{{ $puerto->rack }}</td>
          <td>{{ $puerto->posicion_rack }}</td>
          <td>{{ $puerto->puerto_origen }}</td>
          <td>{{ $puerto->puerto_destino }}</td>
          <td>{{ $puerto->fila_destino }}</td>
          <td>{{ $puerto->rack_destino }}</td>
          <td>{{ $puerto->unidad_destino }}</td>
          <td>{{ $puerto->equipo_destino }}</td>
          <td>{{ $puerto->serie_destino }}</td>
          <td>
            <div class="action-content">
              <button type="button" class="btn-action"><a href="{{ route('puertos.edit', $puerto->id) }}"><i class="fa-solid fa-pen-to-square" style="color: rgb(255, 255, 255);"></i></a></button>
              <form action="{{ route('puertos.destroy', $puerto->id) }}" method="post">
                @csrf
                @method ('DELETE')
                <button type="submit" class="btn-action" onclick="return confirm('¿Deseas borrar el registro?')"><i class="fa-regular fa-trash-can" style="color: rgb(255, 255, 255);"></i></button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  <!--MODAL PARA AGREGAR REGISTRO-->
  <div class="modal-container">
    <form action="{{ route('puertos.store')}}" method="post" class="add-port">
      @csrf
      <div class="head-form-port">
        <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo-puerto" class="logo-puerto">
        <h2 class="title-form">Agregar Registro</h2>
      </div>
      <input type="text" name="nombre_equipo" placeholder="Equipo" class="input-port">
      <input type="text" name="id_html" placeholder="Id reconocimiento HTML" class="input-port">
      <input type="text" name="serie" placeholder="Serie" class="input-port">
      <input type="text" name="fila" placeholder="Fila" class="input-port">
      <input type="text" name="rack" placeholder="Rack" class="input-port">
      <input type="text" name="posicion_rack" placeholder="Unidad" class="input-port">
      <input type="text" name="puerto_origen" placeholder="Puerto de origen" class="input-port">
      <input type="text" name="puerto_destino" placeholder="Puerto de destino" class="input-port">
      <input type="text" name="fila_destino" placeholder="Fila de destino" class="input-port">
      <input type="text" name="rack_destino" placeholder="Rack de destino" class="input-port">
      <input type="text" name="unidad_destino" placeholder="Unidad de destino" class="input-port">
      <input type="text" name="equipo_destino" placeholder="Equipo de destino" class="input-port">
      <input type="text" name="serie_destino" placeholder="Serie de destino" class="input-port">
      <div class="btn-form-content">
        <button type="button" class="btn-pt cerrar">Cancelar</button>
        <button type="submit" class="btn-pt">Insertar</button>
      </div>
    </form>
  </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('scripts/puertos.js') }}"></script>
@endpush