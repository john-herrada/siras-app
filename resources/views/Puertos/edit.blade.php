@extends ('layouts.app')
@section('title', 'Puertos')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/edit-puerto.css') }}?v=999">
@endpush
@section('content')
<!--MODAL PARA AGREGAR REGISTRO-->
  <div class="modal-container">
    <form action="{{ route('puertos.update', $puerto->id) }}" method="post" class="add-port">
      @csrf
      @method ('PUT')
      <div class="head-form-port">
        <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo-puerto" class="logo-puerto">
        <h2 class="title-form">Editar Registro</h2>
      </div>
      <input type="text" name="nombre_equipo" value="{{ $puerto->nombre_equipo }}" class="input-port">
      <input type="text" name="id_html" value="{{ $puerto->id_html }}" class="input-port">
      <input type="text" name="serie" value="{{ $puerto->serie }}" class="input-port">
      <input type="text" name="fila" value="{{ $puerto->fila }}" class="input-port">
      <input type="text" name="rack" value="{{ $puerto->rack }}" class="input-port">
      <input type="text" name="posicion_rack" value="{{ $puerto->posicion_rack }}" class="input-port">
      <input type="text" name="puerto_origen" value="{{ $puerto->puerto_origen }}" class="input-port">
      <input type="text" name="puerto_destino" value="{{ $puerto->puerto_destino }}" class="input-port">
      <input type="text" name="fila_destino" value="{{ $puerto->fila_destino }}" class="input-port">
      <input type="text" name="rack_destino" value="{{ $puerto->rack_destino }}" class="input-port">
      <input type="text" name="unidad_destino" value="{{ $puerto->unidad_destino }}" class="input-port">
      <input type="text" name="equipo_destino" value="{{ $puerto->equipo_destino }}" class="input-port">
      <input type="text" name="serie_destino" value="{{ $puerto->serie_destino }}" class="input-port">
      <div class="btn-form-content">
        <button type="button" class="btn-pt cerrar"><a href="{{ route('puertos.index') }}">Cerrar</a></button>
        <button type="submit" class="btn-pt">Actualizar</button>
      </div>
    </form>
  </div>
  @endsection
@push('scripts')
    <script src="{{ asset('scripts/puertos.js') }}"></script>
@endpush