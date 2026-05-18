@extends ('layouts.app')
@section('title', 'Cintas')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/pass.css') }}?v={{ time() }}">
@endpush
@section('content')
<!--MODAL PARA FORMULARIO DE EDICIÓN-->
<div class="screen-container">
    <form action="{{ route('password.update') }}" method="post" class="form-pass">
        @csrf
        <h3>Cambiar Password</h3>
        <h6>Contraseña de 8 caracteres</h6>
        <input type="password" class="input-pass" name="password" placeholder="Nueva Contraseña">
        <br>
        <input type="password" class="input-pass" name="password_confirmation" placeholder="Confirmar Contraseña">
        <br>
        <button type="submit" class="btn-pass">Actualizar</button>
    </form>
</div>
@endsection