@extends ('layouts.app')
@section('title', 'Desarrollador')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/desarrollador.css') }}?v={{ time() }}">
@endpush
@section('content')
<div class="screen-developer">
    <h2>Tareas De Desarrollador / Soporte</h2>
    <p>Se requiere ingresar directamente en escritorio de origen</p>
    <div class="btn-container">
        <div class="btn-item">
            <button class="btn-info"><a href="http://localhost:8080/phpmyadmin/" target="_blank">Gestionar Base De Datos</a></button>
        </div>
        <div class="btn-item">
            <button class="btn-info"><a href="">Documentación</a></button>
        </div>
        <div class="btn-item">
            <input type="checkbox" id="check">
            <label for="check"id="label-check">Cast</label>
            <!--MODAL CAST-->
            <div class="screenmodal">
                <div class="cast-container">
                    <h2>Ingenieros Tutores Y Supervisores</h2>
                    <ul>
                        <li>Cristian Set</li>
                        <li>Karen Jaramillo</li>
                        <li>Victor Tovar</li>
                    </ul>
                    <br>
                    <h2>Desarrolladores / Servicio Social</h2>
                    <ul>
                        <li>Jonathan Herrada</li>
                        <li>Ricardo Luna</li>
                    </ul>
                    <h2>Documentación / Lluvia de ideas / Servicio Social</h2>
                    <ul>
                        <li>Juan Garcia</li>
                        <li>Ricardo Luna</li>
                    </ul>
                    <h2>Recolección De Información</h2>
                    <ul>
                        <li>Juan Garcia</li>
                    </ul>
                    <label for="check" class="label-info">Cerrar</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection