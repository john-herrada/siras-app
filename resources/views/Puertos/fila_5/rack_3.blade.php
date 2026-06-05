@extends ('layouts.app')
@section('title', 'Filas')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/filas_layout.css') }}?v=99999">
@endpush
@section('content')
<div class="screen-rack">
  <h2 class="title">Rack 3</h2>
  <br>
  <br>
  <div class="port-list-content">
    <div class="port-list-item">

    </div>
    <div class="port-list-item">
      <h2>EQUIPO</h2>
      <P>Serie</P>
      <div class="table-container">
      <table class="table table-striped-columns">
        <tr>
          <th>Puerto de origen</th>
          <th>Puerto de destino</th>
          <th>Fila de destino</th>
          <th>Rack de destino</th>
          <th>Unidad de destino</th>
          <th>Equipo de destino</th>
          <th>Serie de destino</th>
        </tr>
        <tr>
          <td>Data</td>
          <td>Data</td>
          <td>Data</td>
          <td>Data</td>
          <td>Data</td>
          <td>Data</td>
          <td>Data</td>
        </tr>
      </table>
      </div>
    </div>
  </div>
  <div class="btn-content">
    <button class="btn-return">Regresar</button>
  </div>
</div>
@endsection