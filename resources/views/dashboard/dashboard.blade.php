@extends ('layouts.app')
@section('title', 'Dashboard')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}?v={{ time() }}">
@endpush
@section('content')
<div class="screen-dashboard">
    @if(auth()->user()->hasRole('Temporal'))
    <div class="countdown-container">
        <h3 id="countdown"
            data-expiration="{{ auth()->user()->expiration->toIso8601String() }}">
        </h3>
    </div>
    @endif
    <div class="clock-container">
        <div class="clock-item">
            <h2 class="clock"></h2>
        </div>
        <div class="clock-item">
            <h2 class="title-div">Descargas Pendientes</h2>
            <div class="notification">
                @foreach($files as $file)
                <a id="link-download"  href="{{ asset($file->file_path) }}" download>{{ $file->file_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="box-layout">
    <div class="resume-data-container">
        <div class="resume-item">
            <h2 class="title-div">Cintas Totales</h2>
            <h2 class="title-div-content">{{ $stats['cintas'] }}</h2>
        </div>
        <div class="resume-item">
            <h2 class="title-div">Prestamos activos</h2>
            <h2 class="title-div-content">{{ $stats['prestamos'] }}</h2>
        </div>
        <div class="resume-item">
            <h2 class="title-div">Prestamos terminados</h2>
            <h2 class="title-div-content">{{ $stats['entregas'] }}</h2>
        </div>
        <div class="resume-item">
            <h2 class="title-div">Cintas de limpieza</h2>
            <h2 class="title-div-content">{{ $stats['cintas_clean'] }}</h2>
        </div>
    </div>
    <div class="graph-container">
        <div class="graph-item" data-stats='@json($stats)' id="graph-cintas">
            <h2 class="title-div">Inventario de cintas</h2>
            <canvas id="cintas-chart"></canvas>
        </div>
        <div class="graph-item" data-stats='@json($stats)' id="graph-prestamos">
            <h2 class="title-div">Movimientos</h2>
            <canvas id="prestamos-chart"></canvas>
        </div>
    </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    window.dashboardData = {!! json_encode([
        'cintas' => $stats['cintas'],
        'cintas_clean' => $stats['cintas_clean'],
        'prestamos' => $stats['prestamos'],
        'entregas' => $stats['entregas']
    ]) !!};
</script>
<script src="{{ asset ('scripts/dashboard.js') }}?v=2"></script>
@endpush