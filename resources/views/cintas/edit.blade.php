@extends ('layouts.app')
@section('title', 'Cintas')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cintas-edit.css') }}">
@endpush
@section('content')
        <div class="modal-contedit">
            <div class="form-edit">
                <div class="input-edit">
                    <img src="{{ asset('img/SENER_Logo_2019.svg') }}" alt="logo" class="img-form">
                    <img src="{{ asset('img/tape.svg') }}" alt="tape" class="tape">
                    <h2>Editar Cinta</h2>
                </div>
                <div class="input-edit">
                    <form action="{{ route('cintas.update', $cinta->codigo) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" name="codigo" class="input-cintas" value="{{ $cinta->codigo }}">
                        <br>
                        @error('codigo')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="caja_resguardo" class="input-cintas" value="{{ $cinta->caja_resguardo }}">
                        <br>
                        @error('caja_resguardo')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="anaquel" class="input-cintas" value="{{ $cinta->anaquel }}">
                        <br>
                        @error('anaquel')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="nivel" class="input-cintas" value="{{ $cinta->nivel }}">
                        <br>
                        @error('nivel')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" name="sede" class="input-cintas" value="{{ $cinta->sede }}">
                        <br>
                        @error('sede')
                        <span class="error-text">{{ $message }}</span>
                        @enderror
                        <br>
                        <br>
                        <button class="btn-agregarcinta cerrar-modal">Cancelar</button>
                        <button type="submit" class="btn-agregarcinta">Actualizar</button>
                    </form>
                </div>
            </div>
      </div>
    </div>
@endsection
