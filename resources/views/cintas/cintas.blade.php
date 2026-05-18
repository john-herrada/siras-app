@extends ('layouts.app')
@section('title', 'Cintas')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cintas.css') }}?v=900">
@endpush
@section('content')
    <div class="screen-cintas">
        <h2 id="title">Administración de Cintas</h2>
        <br>
        <br>
        <br>
        <input type="checkbox" id="active-create">
        @can('createcinta')
        <label for="active-create" class="btn-createcinta">Agregar Cinta</label>
        @endcan
        <br>
        <br>
        <form method="GET" action="{{ route('cintas.index') }}">
            <label class="lbl-buscar">
                 Buscar Cinta:
            <input type="text" class="buscar" name="buscar" value="{{ request('buscar') }}">
            </label>
            <button type="submit" class="btn-createcinta">Buscar</button>
        </form>
        <br>
        <br>
        <div class="table-container">
        <table class="table table-striped-columns" id="tabla-cintas">
            <tr>
                <th>Codigo</th>
                <th>Caja de resguardo</th>
                <th>Anaquel</th>
                <th>Nivel</th>
                <th>Sede</th>
                @can('tablecinta')
                <th>Acciones</th>
                @endcan
            </tr>
            @foreach($cintas as $cinta)
            <tr>
                <td>{{ $cinta->codigo }}</td>
                <td>{{ $cinta->caja_resguardo }}</td>
                <td>{{ $cinta->anaquel }}</td>
                <td>{{ $cinta->nivel }}</td>
                <td>{{ $cinta->sede }}</td>
                @can('actionscinta')
                <td>
                    <div class="action-cont">
                          <a href="{{ route('cintas.edit', $cinta->codigo) }}" class="btn-action">
                                <i class="fa-solid fa-pen-to-square"  style="color: rgb(255, 255, 255);"></i>
                            </a>
                        <form action="{{ route('cintas.destroy', $cinta->codigo) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type= "submit" onclick="return confirm('¿Deseas borrar el registro?')" class="btn-action"><i class="fa-regular fa-trash-can"
                                    style="color: rgb(255, 255, 255);"></i></button>
                        </form>
                    </div>
                </td>
                @endcan
            </tr>
            @endforeach
        </table>
        </div>
        <div class="mt-3">
            {{ $cintas->links() }}
        </div>
        <!--MODAL PARA FORMULARIO DE CREACIÓN-->
        <div class="modal-contcreate">
            <div class="form-create">
                <div class="input-create">
                    <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo" class="img-form">
                    <img src="{{ asset('img/tape.svg') }}" alt="tape" class="tape">
                    <h2>Agregar Cinta</h2>
                </div>  
                <div class="input-create">
                    <form action="{{ url('/cintas') }}" method="post">
                        @csrf
                        <input type="text" name="codigo" class="input-cintas" placeholder="Codigo" autofocus>
                        <br>
                        @error('codigo')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="caja_resguardo" class="input-cintas" placeholder="Caja de resguardo">
                        <br>
                        @error('caja_resguardo')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="anaquel" class="input-cintas" placeholder="Anaquel">
                        <br>
                        @error('anaquel')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="nivel" class="input-cintas" placeholder="Nivel">
                        <br>
                        @error('nivel')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="sede" class="input-cintas" placeholder="Sede">
                        <br>
                        @error('sede')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <br>
                        <label for="active-create" class="btn-createcinta">Cancelar</label>
                        <button type="submit" class="btn-agregarcinta">Agregar</button>
                    </form>
                </div>
            </div>
      </div>
    </div>
@endsection

