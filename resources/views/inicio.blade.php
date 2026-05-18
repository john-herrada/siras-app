@extends ('layouts.app')
@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}?v=999">
@endpush
@section('content')
<header>
    <img src="{{asset ('img/SENER_Logo_2019.svg')}}" alt="logo" id="logo-head">
    <div class="welcome">
    <div class="user-container"  @if(Auth::user()->foto)
                         style="background-image:url('{{ asset(Auth::user()->foto) }}')"
                        @endif>
         @if(!Auth::user()->foto)                
        <img src="{{ asset('img/user.svg') }}" alt="user" id="user-img">
         @endif
    </div>
    <span class="user-label">Hola {{ auth()->user()->nombre_apellido }}</span>
    </div>
</header>
<div class="toogle-container">
<i class="fa fa-bars" id="menu-toggle"></i>
</div>
<div class="dash-container">
    <nav class="sidebar">   
        <ul class="list-option">
            @can('viewdashboard')
            <li><a onclick="loadPage(`{{ route('dashboard') }}`)"><i class="fa-solid fa-house-chimney"></i></a><span class="text-option">Dashboard</span></li>
            @endcan
            @can('viewcintas')
            <li><a onclick="loadPage(`{{ route('cintas.index') }}`)"><i class="fa-solid fa-compact-disc"></i></a><span class="text-option">Cintas</span></li>
            @endcan
            @can('viewprestamos')
            <li><a onclick="loadPage(`{{ route('prestamo.index') }}`)"><i class="fa-solid fa-building-circle-check"></i></a><span class="text-option">Prestamo De Cinta</span></li>
            @endcan
            @can('viewentregas')
            <li><a onclick="loadPage(`{{ route('entregas.index') }}`)"><i class="fa-solid fa-building-circle-arrow-right"></i></a><span class="text-option">Entrega de cinta</span></li>
            @endcan
            @can('viewusers')
            <li><a onclick="loadPage(`{{ route('user.index') }}`)"><i class="fa-solid fa-users"></i></a><span class="text-option">Administrar Usuarios</span></li>
            @endcan
            <li><a onclick="loadPage(`{{ route('user.reportes') }}`)"><i class="fa-solid fa-file"></i></a><span class="text-option">Reportes Y Archivos</span></li>
            @can('viewsite')
            <li><a onclick="loadPage(`{{ route('site','croquis') }}`)"><i class="fa-solid fa-circle-nodes"></i></a><span class="text-option">Diagrama Interactivo Del Site</span></li>
            @endcan
            @can('viewred')
            <li><a href="http://172.16.83.36/index" target="main-frame"><i class="fa-solid fa-tower-broadcast"></i></a><span class="text-option">Monitoreo De Red</span></li>
            <li><a href="http://172.16.83.36/idfs" target="main-frame"><i class="fa-solid fa-network-wired"></i></a><span class="text-option">IDF´s</span></li>
            <li><a href="http://172.16.83.36/servidores" target="main-frame"><i class="fa-solid fa-tty" style="color: rgb(255, 255, 255);"></i></a><span class="text-option">Servidores Telefonicos</span></li>
            <li><a href="http://172.16.83.36/aps" target="main-frame"><i class="fa-solid fa-wifi"></i></a><span class="text-option">AP´s</span></li>
            <li><a href="http://172.16.83.36/almacenamiento" target="main-frame"><i class="fa-solid fa-server" style="color: rgb(255, 255, 255);"></i></a><span class="text-option">Almacenamiento De Servidores</span></li>
            <li><a onclick="loadPage(`{{ route('tickets.index') }}`)"><i class="fa-solid fa-ticket-simple" style="color: rgb(252, 252, 252);"></i></a><span class="text-option">Seguimiento De Tickets</span></li>
            @endcan
            <li><a onclick="loadPage(`{{ route('logout') }}`)"><i class="fa-solid fa-right-to-bracket"></i></a><span class="text-option">Salir</span></li>
            @can('viewdeveloper')
            <li><a onclick="loadPage(`{{ route('developer') }}`)"><i class="fa-solid fa-code"></i></a><span class="text-option">Opciones De Desarrollador</span></li>
            @endcan
        </ul>
    </nav>
    <main>
        <iframe id="main-frame" src="{{ route('dashboard') }}" name="main-frame"></iframe>
    </main>
</div>
<footer>
        <div class="footer-container">
            <img src="{{asset ('img/SENER_Logo_2019.svg')}}" alt="logo" id="logo-footer">
        </div>
        <div class="footer-container">
            <h5>Dirección</h5>
            <p>Avenida Insurgentes, Número 10, de la<br>Glorieta de Insurgentes, Colonia Roma<br>Norte, C.P. 06700, Alcaldía Cuauhtémoc,<br>Ciudad de México</p>
        </div>
        <div class="footer-container">
            <h5>Línea de atención</h5>
            <p>(55) 5000-6000 ext. 1315</p>
            <br>
            <h5>Horarios de atención</h5>
            <p>09:00 a 15:00 y 17:00 a 19:00 hrs.</p>
        </div>
    </footer>
@endsection
@push('scripts')
    <script src="{{ asset('scripts/inicio.js') }}"></script>
@endpush
